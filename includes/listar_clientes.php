<?php
//Inicio de la tabla html
echo "
<thead>
    <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Apellido Paterno</th>
        <th scope='col'>Apellido Materno</th>
        <th scope='col'>Correo</th>
        <th scope='col'>Numero de Telefono</th>
        <th scope='col'>Acciones</th>
    </tr>
</thead>
<tbody>
";
//si se dio click al boton de buscar
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];

    if ($busqueda == "") {
        echo "<script>window.location.href = 'lista_clientes.php'</script>";
        exit();
    } else {
        switch ($_POST['opcion']) {
            case "id":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, telefono FROM clientes WHERE LOWER(concat(tipo_usuario,id)) LIKE LOWER('$busqueda%')");
                //funcion para hacer las consultas y validaciones para mostrar los resutados
                consultas($consulta);
                break;
            case "apellidos":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, telefono FROM clientes WHERE LOWER(apellido_paterno) LIKE LOWER('$busqueda%') OR LOWER(apellido_materno) LIKE LOWER('$busqueda%') OR LOWER(nombre) LIKE LOWER('$busqueda%')");
                consultas($consulta);
                break;
            case "correo":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, telefono FROM clientes WHERE LOWER(correo) LIKE LOWER('$busqueda%')");
                consultas($consulta);
                break;
        }
    }

    //si no muestra todos los resultados
} else {
    //Se muestran solo los de estatus activo
    $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, telefono FROM clientes");
    consultas($consulta);
}

//funcion que se encargara de imprimir la tabla
function tabla($codigo, $nombre, $apellido_paterno, $apellido_materno, $correo, $telefono ,$id)
{
         //Esta opcion es la de eliminar y editar
        $opcion_admin_td = "
            <td class='acciones'>
                <a href='formulario_editar_cliente.php?id=" . $id. "' class='editar' ></a>
                <a class ='eliminar_cli' data-bs-toggle='modal' data-bs-target = #" . $nombre . "></a>
            </td>";
    //mostramos el contenido de la tabla
    echo "
            <tr>
                <th scope='row'>" . $codigo . "</th>
                <td>" . $nombre . "</td>
                <td>" . $apellido_paterno . "</td>
                <td>" . $apellido_materno . "</td>
                <td>" . $correo . "</td>
                <td>". $telefono ."</td>
                " . $opcion_admin_td . "
            </tr>
        ";
    //modal personalizado
    echo "
    <div class='modal fade' id=" . $nombre . " data-bs-backdrop='static' data-bs-keyboard='false'
    aria-hidden='true' aria-labelledby='exampleModalToggleLabel' tabindex='-1'>
    <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalToggleLabel'>Seguro que quieres eliminar a
                    " . $nombre . " ?
                </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                Los datos se eliminaran permanentemente.
            </div>
            <div class='modal-footer'>
                <form action='../includes/eliminar_cliente.php' method='post'>
                    <button type='button' name='editar' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <button type='submit' name='borrar' class='btn btn-danger'>Eliminar</button>
                    <input type='text' name='id' value=" . $codigo . " hidden>
                </form>
            </div>
        </div>
    </div>
</div>
    ";
}
function consultas($consulta){
    //Si la consulta tiene valores asignalos a el arreglo usuario
    if ($consulta) {
        while ($usuario = $consulta->fetch_array()) {
            //le pasamos los datos a la funcion que imprimira el contenido de la tabla
            tabla($usuario['codigo'], $usuario['nombre'], $usuario['apellido_paterno'], $usuario['apellido_materno'], $usuario['correo'], $usuario['telefono'], $usuario['id']);
        }
    }
}
echo "
</tbody>
    ";
?>