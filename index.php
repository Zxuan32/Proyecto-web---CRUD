<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

ini_set('display_errors', 'Off');

include 'includes/saludo.php';
include 'includes/iniciar_sesion.php';

//comprueba si el usuario ya estaba logeado con su id que se guarda mediante una sesion
$id = $_SESSION['id'];

//si esta logeado lo manda a la pagina principal
if ($id != '' || $id != null) {
    header('Location: public_html/lista_usuarios.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/icon.png">
    <link rel="stylesheet" href="public_html/css/index.css">
    <title>Inicio de Sesion</title>
</head>

<body>
    <div class="contenedor-principal">
        <div class="contenedor-inicio-sesion">
            <div class="contenedor-imagen">
                <img src=<?php echo $imagen; ?> alt="">
            </div>
            <div class="contenedor-formulario">
                <p>Hola!</p>
                <p><strong>
                        <?php echo $mensaje; ?>
                    </strong></p>

                <form action="" method="post" autocomplete="off">
                    <p><strong>Inicia</strong> sesión con tu cuenta</p><br>
                    <label for="usuario">Usuario</label> <br>
                    <input type="text" name="usuario" maxlength="8" value='<?php echo $usuario; ?>'
                        placeholder='<?php echo $placeHolder; ?>' required pattern="^[^\s]+$"> <br>
                    <label for="clave_acceso">Contraseña</label> <br>
                    <input type="password" name="clave_acceso" id='<?php echo $error; ?>' required> <br>
                    <a href="public_html/formulario_crear_cuenta.php">No tienes una cuenta?</a> <br>
                    <button type="submit" name="entrar">Entrar</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>