<?php
$nombre_proveedor = "";
$telefono_proveedor = "";
$calle_proveedor = "";
$colonia_proveedor = "";
$ruc_proveedor = "";
$correo_proveedor = "";
date_default_timezone_set("America/Mexico_City");
$fecha_registro = date("Y-m-d");

$placeholder_nombre = "";
$placeholder_telefono = "";
$placeholder_ruc_proveedor = "";
$placeholder_correo = "";
if (isset($_POST['guardar'])) {
    $nombre_proveedor = $_POST['nombre'];
    $telefono_proveedor = $_POST['telefono'];
    $calle_proveedor = $_POST['calle'];
    $colonia_proveedor = $_POST['colonia'];
    $ruc_proveedor = $_POST['ruc_proveedor'];
    $correo_proveedor = $_POST['correo'];

    if (validar_existente($conn, $nombre_proveedor, "nombre") > 0) {
        $nombre_proveedor = "";
        $placeholder_nombre = "Nombre ya registrado";
    } elseif (validar_existente($conn, $telefono_proveedor, "telefono") > 0) {
        $telefono_proveedor = "";
        $placeholder_telefono = "Telefono ya registrado";
    } elseif (validar_existente($conn, $ruc_proveedor, "ruc_proveedor") > 0) {
        $ruc_proveedor = "";
        $placeholder_ruc_proveedor = "RUC ya registrado";
    } elseif (validar_existente($conn, $correo_proveedor, "correo") > 0) {
        $correo_proveedor = "";
        $placeholder_telefono = "correo ya registrado";
    } else {
        if ($_FILES["foto_proveedor"]['size'] != 0) {
            $imagen = $_FILES['foto_proveedor']['tmp_name'];
            $nombre_imagen = $_FILES['foto_proveedor']['name'];
            $ruta = 'uploads/proveedores/' . $nombre_proveedor . $nombre_imagen;
            move_uploaded_file($imagen, '../' . $ruta);
            $consulta = mysqli_query($conn, "INSERT INTO proveedores (nombre, telefono, calle, colonia, ruc_proveedor, correo, foto_proveedor, fecha_registro) VALUES ('$nombre_proveedor','$telefono_proveedor', '$calle_proveedor', '$colonia_proveedor', '$ruc_proveedor', '$correo_proveedor', '$ruta', '$fecha_registro')");
            echo "<script> window.location.href = 'OKP.php' </script>";
        } else {
            $consulta = mysqli_query($conn, "INSERT INTO proveedores (nombre, telefono, calle, colonia, ruc_proveedor, correo, fecha_registro) VALUES ('$nombre_proveedor','$telefono_proveedor', '$calle_proveedor', '$colonia_proveedor', '$ruc_proveedor', '$correo_proveedor', '$fecha_registro')");
            echo "<script> window.location.href = 'OKP.php' </script>";
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