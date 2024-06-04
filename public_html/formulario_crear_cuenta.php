<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

include '../includes/crear_cuenta.php';
//ini_set('display_errors', 'Off');

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
    <link rel="shortcut icon" href="../imagenes/icon.png">
    <link rel="stylesheet" href="css/crear_cuenta.css">
    <title>Nuevo ingreso</title>
</head>

<body>
    <div class="contenedor-principal">
        <div class="contenedor-inicio-sesion">
            <div class="contenedor-imagen">
                <img src="img/formulario_crear.png" alt="">
            </div>
            <div class="contenedor-formulario">
                <form action="" method="post" autocomplete="off">
                    <p><strong>Crea</strong> una nueva cuenta</p><br>
                    <div class="contenedorDatos">
                        <div class="contenedorDatosObligatorios">
                            <label for="nombre">* Nombres</label>
                            <input name="nombre" maxlength="20" value='<?php echo $nombre?>' required> <br>
                            <label for="apellido_paterno">* Apellido paterno</label>
                            <input name="apellido_paterno" maxlength="20" value='<?php echo $apellido_paterno?>' required> <br>
                            <label for="apellido_materno">* Apellido materno</label>
                            <input name="apellido_materno" maxlength="20" value='<?php echo $apellido_materno?>' required> <br>
                            <label for="edad">* Edad</label>
                            <input name="edad" type="number" min="18" max="99" value='<?php echo $edad?>' required> <br>
                            <label for="sexo">* Sexo</label> <br>
                            <select name="sexo">
                                <option value="0">Masculino</option>
                                <option value="1">Femenino</option>
                            </select> <br>
                            <label for="rfc">* RFC.</label>
                            <input name="rfc" maxlength="13" value='<?php echo $rfc?>' required> <br>
                        </div>
                        <div class="contenedorDatosOpcionales">
                            <label for="usuario">* Nombre de usuario</label>
                            <input name="usuario" maxlength="8" placeholder='<?php echo $placeholder_usuario_repetido ?>' required> <br>
                            <label for="clave_acceso">* Contraseña</label>
                            <input name="clave_acceso" type="password" maxlength="10" value='<?php echo $clave_acceso?>' required> <br>
                            <label for="correo">* Correo electronico</label>
                            <input name="correo" maxlength="30" value='<?php echo $correo?>' required> <br>
                            <label for="telefono">* Numero de telefono</label>
                            <input name="telefono" max="9999999999" type="number" value='<?php echo $telefono?>' required> <br>
                            <label for="calle">* Calle</label>
                            <input name="calle" maxlength="30" value='<?php echo $calle?>' required> <br>
                            <label for="colonia">* Colonia</label>
                            <input name="colonia" maxlength="30" value='<?php echo $colonia?>' required> <br>
                        </div>
                    </div>
                    <a href="..">Ya tienes una cuenta?</a> <br>
                    <button type="submit" name="crear">Crear</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>