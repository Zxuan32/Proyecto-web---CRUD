<?php
$id = $_SESSION['id'];

$consulta = mysqli_query($conn, "SELECT * from usuarios WHERE id = '$id'");
$resultado = mysqli_fetch_array($consulta);

$zona_horaria = date_default_timezone_get();

$fecha = new DateTime();

// Formato de fecha en español: Vie, 22 Abr
$formato = str_replace(
    ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    $fecha->format("D, d M")
);
$nombre = $resultado['nombre'];
$apellido_paterno = $resultado['apellido_paterno'];
$apellido_materno = $resultado['apellido_materno'];
$edad = $resultado['edad'];
$sexo = $resultado['sexo'];
$rfc = $resultado['rfc'];
$calle = $resultado['calle'];
$colonia = $resultado['colonia'];
$telefono = $resultado['telefono'];
$correo = $resultado['correo'];
$usuario = $resultado['usuario'];
$clave_acceso = $resultado['clave_acceso'];
$tipo_usuario = $resultado['tipo_usuario'];
$estatus = $resultado['estatus'];
$fecha_registro = $resultado['fecha_registro'];
$foto_perfil = $resultado['foto_perfil'];

//Dar formato a los datos necesaios
if ($estatus == 0) {
    $estatus = "Inactivo";
    $estilo = "style='background-color: #bf1f1f '";
} else {
    $estatus = "Activo";
    $estilo = "";
}
if ($tipo_usuario == "ADM") {
    $tipo_usuario = "Administrador";
} else {
    $tipo_usuario = "Cajero";
}
?>