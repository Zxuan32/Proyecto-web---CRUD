<?php
$cliente_nombre = "";
$cliente_apellido_paterno = "";
$cliente_apellido_materno = "";
$cliente_calle = "";
$cliente_colonia = "";
$cliente_codigo_postal = "";
$cliente_telefono = "";
$cliente_correo = "";
$cliente_sexo = 0;
$cliente_banco = "";
$cliente_numero_cuenta = "";
$cliente_tipo_cuenta_bancaria = 0;

$placeholder_telefono = "";
$placeholder_correo = "";

if (isset($_POST['crear'])) {
    $cliente_nombre = $_POST['nombre'];
    $cliente_apellido_paterno = $_POST['apellido_paterno'];
    $cliente_apellido_materno = $_POST['apellido_materno'];
    $cliente_calle = $_POST['calle'];
    $cliente_colonia = $_POST['colonia'];
    $cliente_codigo_postal = $_POST['codigo_postal'];
    $cliente_telefono = $_POST['telefono'];
    $cliente_correo = $_POST['correo'];
    $cliente_sexo = $_POST['sexo'];
    $cliente_banco = $_POST['banco'];
    $cliente_numero_cuenta = $_POST['numero_cuenta'];
    $cliente_tipo_cuenta_bancaria = $_POST['tipo_cuenta_bancaria'];

    if (validar_existente($conn, $cliente_telefono, "telefono") > 0) {
        $cliente_telefono = "";
        $placeholder_telefono = "El numero de telefono ya esta en uso";
    } elseif (validar_existente($conn, $cliente_correo, "correo") > 0) {
        $cliente_correo = "";
        $placeholder_correo = "Correo no disponible";
    } else {
        $consulta = mysqli_query($conn, "INSERT INTO clientes 
        (nombre, apellido_paterno, apellido_materno, sexo, correo, telefono, calle, colonia, banco, numero_cuenta, tipo_cuenta_bancaria, codigo_postal) VALUES 
        ('$cliente_nombre','$cliente_apellido_paterno', '$cliente_apellido_materno', '$cliente_sexo', '$cliente_correo', '$cliente_telefono', '$cliente_calle', '$cliente_colonia', '$cliente_banco', '$cliente_numero_cuenta', '$cliente_tipo_cuenta_bancaria', $cliente_codigo_postal)");
        echo "<script> window.location.href = 'OKC.php' </script>";
    }
}
function validar_existente($conexion, $dato, $donde)
{
    $repetido = 0;
    $consulta = mysqli_query($conexion, "SELECT $donde FROM clientes WHERE LOWER($donde) = LOWER('$dato')");
    if ($consulta->num_rows > 0) {
        $repetido = 1;
    }
    return $repetido;
}
?>