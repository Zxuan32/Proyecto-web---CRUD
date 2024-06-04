<?php
//primero comprobamos si el usuario logeado es administrador
$opcion_admin_th = "";
$admin = $resultado['tipo_usuario'];
$opcion_admin_th = "<th scope='col' class='acciones' >Acciones</th>";
//Inicio de la tabla html
echo "
<thead>
    <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Telefono</th>
        <th scope='col'>Calle</th>
        <th scope='col'>Colonia</th>
        <th scope='col'>RUC</th>
        <th scope='col'>Correo</th>
        " . $opcion_admin_th . "
    </tr>
</thead>
<tbody>
";
//si se dio click al boton de buscar
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];

    if ($busqueda == "") {
        echo "<script>window.location.href = 'lista_proveedores.php'</script>";
        exit();
    } else {
        switch ($_POST['opcion']) {
            case "id":
                $consulta = mysqli_query($conn, "SELECT id, nombre, telefono, calle, colonia, ruc_proveedor, correo FROM proveedores WHERE id LIKE '$busqueda%'");
                //funcion para hacer las consultas y validaciones para mostrar los resutados
                consultas($consulta, $admin);
                break;
            case "nombre":
                $consulta = mysqli_query($conn, "SELECT id, nombre, telefono, calle, colonia, ruc_proveedor, correo FROM proveedores WHERE LOWER(nombre) LIKE LOWER('$busqueda%')");
                consultas($consulta, $admin);
                break;
            case "ruc_proveedor":
                $consulta = mysqli_query($conn, "SELECT id, nombre, telefono, calle, colonia, ruc_proveedor, correo FROM proveedores WHERE LOWER(ruc_proveedor) LIKE LOWER('$busqueda%')");
                consultas($consulta, $admin);
                break;
            case "correo":
                    $consulta = mysqli_query($conn, "SELECT id, nombre, telefono, calle, colonia, ruc_proveedor, correo FROM proveedores WHERE LOWER(correo) LIKE LOWER('$busqueda%')");
                    consultas($consulta, $admin);
                    break;
        }
    }

    //si no muestra todos los resultados
} else {
    //Se muestran solo los de estatus activo
    $consulta = mysqli_query($conn, "SELECT * FROM proveedores");
    consultas($consulta, $admin);
}

//funcion que se encargara de imprimir la tabla
function tabla($id, $nombre, $telefono, $calle, $colonia, $ruc_proveedor, $correo, $admin)
{
    if ($admin == 'ADM') {
        $opcion_admin_td = "
        <td class='acciones'>
            <a href='formulario_editar_proveedor.php?id=" .$id . "' class='editar' ></a>
            <a class ='eliminar_cli' data-bs-toggle='modal' data-bs-target = #" . $nombre . "></a>
            <a href='ver_proveedor.php?id=" .$id . "' class ='ver'></a>
        </td>";
    }
    else{
        $opcion_admin_td = "
        <td class='acciones'>
            <a class ='ver' data-bs-toggle='modal' data-bs-target = #".$id."></a>
        </td>";
    }
  
    //mostramos el contenido de la tabla
    echo "
            <tr>
                <th scope='row'>" . $id . "</th>
                <td>" . $nombre . "</td>
                <td>" . $telefono . "</td>
                <td>" . $calle . "</td>
                <td>" . $colonia . "</td>
                <td>". $ruc_proveedor ."</td>
                <td>". $correo ."</td>
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
                <form action='../includes/eliminar_proveedor.php' method='post'>
                    <button type='button' name='editar' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                    <button type='submit' name='borrar' class='btn btn-danger'>Eliminar</button>
                    <input type='text' name='id' value=" .$id." hidden>
                </form>
            </div>
        </div>
    </div>
</div>
    ";
}
function consultas($consulta, $admin){
    //Si la consulta tiene valores asignalos a el arreglo usuario
    if ($consulta) {
        while ($proveedor = $consulta->fetch_array()) {
            //le pasamos los datos a la funcion que imprimira el contenido de la tabla
            tabla($proveedor['id'], $proveedor['nombre'], $proveedor['telefono'], $proveedor['calle'], $proveedor['colonia'], $proveedor['ruc_proveedor'], $proveedor['correo'],  $admin);
        }
    }
}
echo "
</tbody>
    ";
?>