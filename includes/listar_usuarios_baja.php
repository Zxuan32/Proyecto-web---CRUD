<?php
//primero comprobamos si el usuario logeado es administrador
$opcion_admin_th = "";
if ($resultado['tipo_usuario'] == 'ADM') {
    $opcion_admin_th = "<th scope='col' class='acciones' >Acciones</th>";
}
//Inicio de la tabla html
echo "
<thead>
    <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Apellido Paterno</th>
        <th scope='col'>Apellido Materno</th>
        <th scope='col'>Correo</th>
        <th scope='col'>Tipo Usuario</th>
        " . $opcion_admin_th . "
    </tr>
</thead>
<tbody>
";
//si se dio click al boton de buscar
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];

    if ($busqueda == "") {
        echo "<script>window.location.href = 'lista_usuarios.php'</script>";
        exit();
    } else {
        switch ($_POST['opcion']) {
            case "id":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, estatus FROM usuarios WHERE LOWER(concat(tipo_usuario,id)) LIKE LOWER('$busqueda%')");
                //funcion para hacer las consultas y validaciones para mostrar los resutados
                consultas($consulta,$resultado);
                break;
            case "apellidos":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, estatus FROM usuarios WHERE LOWER(apellido_paterno) LIKE LOWER('$busqueda%') OR LOWER(apellido_materno) LIKE LOWER('$busqueda%') OR LOWER(nombre) LIKE LOWER('$busqueda%')");
                consultas($consulta,$resultado);
                break;
            case "correo":
                $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, estatus FROM usuarios WHERE LOWER(correo) LIKE LOWER('$busqueda%')");
                consultas($consulta,$resultado);
                break;
        }
    }

    //si no muestra todos los resultados
} else {
    //Se muestran solo los de estatus activo
    $consulta = mysqli_query($conn, "SELECT concat(tipo_usuario,id) codigo, nombre, apellido_paterno, apellido_materno, correo, tipo_usuario, id, estatus FROM usuarios");
    consultas($consulta,$resultado);
}

//funcion que se encargara de imprimir la tabla
function tabla($codigo, $nombre, $apellido_paterno, $apellido_materno, $correo, $tipo_usuario, $administrador,$id)
{
    //Es la opcion si es administrador por defecto vacio
    $opcion_admin_td = '';
    //Se comprueba si el usuario es administrador para habilitar la opcion
    if ($administrador == 'ADM') {
        //Esta opcion es la de eliminar y editar
        $opcion_admin_td = "
            <td class='acciones'>
                <a href='formulario_editar_usuario.php?id=" . $id. "' class='editar' ></a>
                <a class ='eliminar' data-bs-toggle='modal' data-bs-target = #" . $nombre . "></a>
            </td>";
    }
    //Damos formato al tipo de usuario de cada usuario a mostrar
    switch ($tipo_usuario) {
        case 'ADM':
            $tipo_usuario = "Administrador";
            break;
        case 'CAJ':
            $tipo_usuario = "Cajero";
            break;
    }
    //mostramos el contenido de la tabla
    echo "
            <tr>
                <th scope='row'>" . $codigo . "</th>
                <td>" . $nombre . "</td>
                <td>" . $apellido_paterno . "</td>
                <td>" . $apellido_materno . "</td>
                <td>" . $correo . "</td>
                <td>" . $tipo_usuario . "</td>
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
                <h5 class='modal-title' id='exampleModalToggleLabel'>Seguro que quieres dar de alta a
                    " . $nombre . " ?
                </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                El usuario volvera a estar activo.
            </div>
            <div class='modal-footer'>
                <form action='../includes/dar_alta_usuario.php' method='post'>
                    <button type='button' name='editar' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <button type='submit' name='borrar' class='btn btn-success'>Dar de alta</button>
                    <input type='text' name='id' value=" . $codigo . " hidden>
                </form>
            </div>
        </div>
    </div>
</div>
    ";
}
function consultas($consulta, $datos_usuario_logeado){
    //Si la consulta tiene valores asignalos a el arreglo usuario
    if ($consulta) {
        while ($usuario = $consulta->fetch_array()) {
            //Se excluye de la lista tu propio usuario
            if ($usuario['id'] == $datos_usuario_logeado['id']) {
                continue;
            }
            if ($usuario['estatus'] == '1') {
                continue;
            }
            //le pasamos los datos a la funcion que imprimira el contenido de la tabla
            tabla($usuario['codigo'], $usuario['nombre'], $usuario['apellido_paterno'], $usuario['apellido_materno'], $usuario['correo'], $usuario['tipo_usuario'], $datos_usuario_logeado['tipo_usuario'], $usuario['id']);
        }
    }
}
echo "
</tbody>
    ";
?>