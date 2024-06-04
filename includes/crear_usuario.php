<?php
$nuevo_nombre = "";
$nuevo_apellido_paterno = "";
$nuevo_apellido_materno = "";
$nuevo_edad = "";
$nuevo_sexo = 0;
$nuevo_rfc = "";
$nuevo_calle = "";
$nuevo_colonia = "";
$nuevo_telefono = "";
$nuevo_correo = "";
$nuevo_usuario = "";
$nuevo_clave_acceso = "";
$nuevo_tipo_usuario = "CAJ";

$placeholder_usuario = "";
$placeHolder_rfc = "";
$placeHolder_correo = "";
if (isset($_POST['guardar'])) {
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_apellido_paterno = $_POST['apellido_paterno'];
    $nuevo_apellido_materno = $_POST['apellido_materno'];
    $nuevo_edad = $_POST['edad'];
    $nuevo_sexo = $_POST['sexo'];
    $nuevo_rfc = strtoupper($_POST['rfc']);
    $nuevo_calle = $_POST['calle'];
    $nuevo_colonia = $_POST['colonia'];
    $nuevo_telefono = $_POST['telefono'];
    $nuevo_correo = $_POST['correo'];
    $nuevo_usuario = $_POST['usuario'];
    $nuevo_clave_acceso = $_POST['clave_acceso'];
    $nuevo_tipo_usuario = $_POST['tipo_usuario'];
    date_default_timezone_set("America/Mexico_City");
    $fecha_registro = date("Y-m-d");

    if (validar_existente($conn, $nuevo_usuario, "usuario") > 0) {
        $nuevo_usuario = "";
        $placeholder_usuario = "Usuario no disponible";
    } elseif (validar_existente($conn, $nuevo_correo, "correo") > 0) {
        $nuevo_correo = "";
        $placeHolder_correo = "Correo no disponible";
    } elseif (validar_existente($conn, $nuevo_rfc, "rfc") > 0) {
        $nuevo_rfc = "";
        $placeHolder_rfc = "RFC ya en uso";
    } else {
        if ($_FILES["foto_usuario"]['size'] != 0) {
            $imagen = $_FILES['foto_usuario']['tmp_name'];
            $nombre_imagen = $_FILES['foto_usuario']['name'];
            $ruta = 'uploads/usuarios/' . $nuevo_usuario . $nombre_imagen;
            move_uploaded_file($imagen, '../' . $ruta);
            $consulta = mysqli_query($conn, "INSERT INTO usuarios 
        (nombre, apellido_paterno, apellido_materno, edad, sexo, rfc, usuario, clave_acceso, correo, telefono, calle, colonia, fecha_registro, tipo_usuario, foto_perfil) VALUES 
        ('$nuevo_nombre','$nuevo_apellido_paterno', '$nuevo_apellido_materno', '$nuevo_edad', '$nuevo_sexo', '$nuevo_rfc', '$nuevo_usuario','$clave_acceso', '$nuevo_correo', '$nuevo_telefono', '$nuevo_calle', '$nuevo_colonia', '$fecha_registro', '$nuevo_tipo_usuario', '$ruta')");
            echo "<script> window.location.href = 'OK.php' </script>";
        } else {
            $consulta = mysqli_query($conn, "INSERT INTO usuarios 
        (nombre, apellido_paterno, apellido_materno, edad, sexo, rfc, usuario, clave_acceso, correo, telefono, calle, colonia, fecha_registro, tipo_usuario) VALUES 
        ('$nuevo_nombre','$nuevo_apellido_paterno', '$nuevo_apellido_materno', '$nuevo_edad', '$nuevo_sexo', '$nuevo_rfc', '$nuevo_usuario','$clave_acceso', '$nuevo_correo', '$nuevo_telefono', '$nuevo_calle', '$nuevo_colonia', '$fecha_registro', '$nuevo_tipo_usuario')");
            echo "<script> window.location.href = 'OK.php' </script>";
        }
    }
}
function validar_existente($conexion, $dato, $donde)
{
    $repetido = 0;
    $consulta = mysqli_query($conexion, "SELECT $donde FROM usuarios WHERE LOWER($donde) = LOWER('$dato')");
    if ($consulta->num_rows > 0) {
        $repetido = 1;
    }
    return $repetido;
}
