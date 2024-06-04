<?php
$nombre = "";
$apellido_paterno = "";
$apellido_materno = "";
$edad = "";
$sexo = "";
$rfc = "";
$usuario = "";
$clave_acceso = "";
$correo = "";
$telefono = "";
$calle = "";
$placeholder_usuario_repetido = "";
$colonia = "";
if (isset($_POST['crear'])) {
    include '../config/conexion.php';

    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $rfc = strtoupper($_POST['rfc']);
    $usuario = $_POST['usuario'];
    $clave_acceso = $_POST['clave_acceso'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    date_default_timezone_set("America/Mexico_City");
    $fecha_registro = date("Y-m-d");

    //se genera la consulta para saber si el usuario existe, solo sacamos el nombre del usuario
    $consulta = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE LOWER(usuario) = LOWER('$usuario')");
    //si existe entonces manda un mensaje al input de usuario para hacer saber que el usuario no esta disponible
    if ($consulta->num_rows > 0) {
        $placeholder_usuario_repetido = "El nombre de usuario ya esta en uso";
    } else {
        //si el nombre de usuario no existe podemos crear la cuenta
        $consulta = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, edad, sexo, rfc, usuario, clave_acceso, correo, telefono, calle, colonia, fecha_registro) VALUES('$nombre', '$apellido_paterno', '$apellido_materno', '$edad', '$sexo', '$rfc', '$usuario', '$clave_acceso', '$correo', '$telefono', '$calle', '$colonia', '$fecha_registro')";
        $resultado = mysqli_query($conn, $consulta);

        if (!$resultado) {
            echo "Error";
        } else {
            //Se realiza la consulta para obtener la id del nuevo usuario creado
            $consulta = mysqli_query($conn, "SELECT id FROM usuarios WHERE LOWER(usuario) = LOWER('$usuario')");
            $resultado = mysqli_fetch_array($consulta);

            //Guardamos la id en unsa sesion para posterior recuperacion de datos
            $_SESSION['id'] = $resultado['id'];
            
            header("Location: lista_usuarios.php");
            die();
        }
    }
    $conn->close();
}
?>