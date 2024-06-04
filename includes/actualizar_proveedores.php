<?php
if(isset($_POST['guardar'])){
    $nuevo_nombre_proveedor = $_POST['nombre'];
    $nuevo_calle_proveedor = $_POST['calle'];
    $nuevo_ruc_proveedor = $_POST['ruc_proveedor'];
    $nuevo_telefono_proveedor = $_POST['telefono'];
    $nuevo_colonia_proveedor = $_POST['colonia'];
    $nuevo_correo_proveedor = $_POST['correo'];

    if(
        $nuevo_nombre_proveedor == $nombre_proveedor &&
        $nuevo_calle_proveedor == $calle_proveedor &&
        $nuevo_ruc_proveedor == $ruc_proveedor &&
        $nuevo_telefono_proveedor == $telefono_proveedor &&
        $nuevo_colonia_proveedor == $colonia_proveedor &&
        $nuevo_correo_proveedor == $correo_proveedor &&
        $_FILES["foto_proveedor"]['size'] == 0
    ){
        echo "Sin cambios por hacer";
    }
    else{
        if($nuevo_nombre_proveedor != $nombre_proveedor){
            if (validar_existente($conn, $nuevo_nombre_proveedor, "nombre") > 0) {
                $nombre_proveedor = "";
                $placeholder_nombre = "Nombre ya registrado";
            }
            else{
                $consulta = mysqli_query($conn,"UPDATE proveedores SET nombre = '$nuevo_nombre_proveedor' WHERE id = '$id_proveedor'");
                $nombre_proveedor = $nuevo_nombre_proveedor;
            }
        }
    }
}
function validar_existente($conexion, $dato, $donde)
{
    $repetido = 0;
    $consulta = mysqli_query($conexion, "SELECT $donde FROM proveedores WHERE LOWER($donde) = LOWER('$dato')");
    if ($consulta->num_rows > 0) {
        $repetido = 1;
    }
    return $repetido;
}
?>