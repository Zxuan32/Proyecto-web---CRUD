<?php
//se inicializan los datos vacios
$usuario = "";
$correo = "";
$clave_acceso = "";

$error = "";
$placeHolder = '';
$usuarioRepetido = "";
//comprobar si se le dio click al boton entrar
if (isset($_POST['entrar'])) {
    //incluimos la conexion
    include 'config/conexion.php';
    //recuperamos los datos de los inputs
    $usuario = $_POST['usuario'];
    $clave_acceso = $_POST['clave_acceso'];
    //se genera la consulta para saber si el usuario existe, solo sacamos el nombre del usuario
    $consulta = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE LOWER(usuario) = LOWER('$usuario')");
    //si la consulta es mayor a 0 significa que ya hay un usuario registrado, entonces podemos comparar si las contraseñas coinciden
    if ($consulta->num_rows > 0) {
        //generamos la consulta de la contraseña y la id para guardarla en la sesion (solo la id)
        $consulta = mysqli_query($conn, "SELECT clave_acceso, id, estatus FROM usuarios WHERE LOWER(usuario) = LOWER('$usuario')");
        $resultado = mysqli_fetch_array($consulta);

        if ($resultado['clave_acceso'] == $clave_acceso) {
            //si las contraseñas coinciden comprobamos si la cuenta esta activa
            if($resultado['estatus'] == 1){
                //iniciamos la sesion y guardamos la id del usuario para futuras consultas de datos
                $_SESSION['id'] = $resultado['id'];

                header("Location: public_html/lista_usuarios.php");
                exit();
            }
            else{
                $usuario = "";
                $placeHolder = "La cuenta esta dada de baja";
            }
        } else {
            //si las contraseñas son incorrectas manda un estilo color rojo al input
            $error = "input-error";
        }
    } else {
        //si el usuario no existe muestra mensaje y limpiamos la variable
        $usuario = "";
        $placeHolder = "El nombre de usuario no existe";
    }
    $conn->close();
}
?>