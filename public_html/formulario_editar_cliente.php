<?php
session_start();
include '../config/conexion.php';
include '../includes/saludo.php';
include '../includes/datos_cliente_seleccionado.php';
include '../includes/datos_sesion.php';
include '../includes/actualizar_cliente.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/plantilla.css">
    <link rel="stylesheet" href="css/crear_cliente.css">
    <title>Inicio</title>
</head>

<body>
    <nav>
        <a href="" class="gameverse">
            <img src="../assets/img/gameverse.png" alt="">
            <p>GameVerse</p>
        </a>

        <ul>
            <li><a href="lista_usuarios.php">Usuarios</a></li>
            <li><a href="lista_clientes.php">Clientes</a></li>
            <li><a href="lista_proveedores.php">Proveedores</a></li>
            <li><a href="">Ventas</a></li>
            <li><a href="">Productos</a></li>
        </ul>
    </nav>
    <aside>
        <div class="datos_usuario">
            <img src="<?php echo '../' . $resultado['foto_perfil'] ?>" alt="">
            <div class="contenedor_nombre_usuario">
                <p class="nombre">
                    <?php echo $resultado['nombre'] . " " . $resultado['apellido_paterno'] ?>
                </p>
                <p class="usuario"><?php echo $resultado['usuario'] ?> |</p>
                <p class="tipo_usuario"><?php echo $tipo_usuario ?></p>
            </div>
            <button class="ver_informacion" onclick="window.location.href = 'ver_perfil.php'">Ver perfil</button>
            <button class="cerrar_sesion" onclick="window.location.href = 'finalizar_sesion.php';">Cerrar
                sesion</button>
        </div>
        <div class="contenedor_fecha">
            <div class="contenedor_imagen"></div>
            <div>
                <p class="fecha"><?php echo $formato ?></p>
                <p class="zona"><?php echo $zona_horaria ?></p>
            </div>
        </div>
        <div class="contenedor_saludo">
            <p><?php echo $mensaje_log ?></p>
            <img src="<?php echo $imagen_log ?>" alt="">
        </div>
    </aside>

    <div class="principal">
        <p class="titulo">Datos del cliente</p>
        <form method="post">
        <div class="contenedor_datos">
            <div>
                <label for="nombre">* Nombre</label>
                <input type="text" value="<?php echo $cliente_nombre_seleccionado; ?>" name="nombre" maxlength="20" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$" title="Por favor, ingresa solo letras y espacios" required autocomplete="off">
                <label for="calle">* Calle</label>
                <input type="text" value="<?php echo $cliente_calle_seleccionado; ?>" name="calle" maxlength="30"  required autocomplete="off">
                <label for="telefono">* Telefono</label>
                <input type="text" value="<?php echo $cliente_telefono_seleccionado; ?>" placeholder="<?php echo $placeholder_telefono; ?>" name="telefono" maxlength="10" pattern="[0-9]+" title="Por favor, ingresa solo números" required>
                <label for="banco">* Banco</label>
                <input type="text" value="<?php echo $cliente_banco_seleccionado; ?>"name="banco" maxlength="20" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$" title="Por favor, ingresa solo letras y espacios" required>
            </div>
            <div>
                <label for="apellido_paterno">* Apellido paterno</label>
                <input type="text" value="<?php echo $cliente_apellido_paterno_seleccionado; ?>" name="apellido_paterno" maxlength="20" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$" title="Por favor, ingresa solo letras y espacios" required autocomplete="off">
                <label for="colonia">* Colonia</label>
                <input type="text" value="<?php echo $cliente_colonia_seleccionado; ?>" name="colonia" maxlength="30" required autocomplete="off">
                <label for="correo">* Correo</label>
                <input type="email" value="<?php echo $cliente_correo_seleccionado; ?>" placeholder="<?php echo $placeholder_correo; ?>" name="correo" maxlength="30" required>
                <label for="numero_cuenta">* Numero de cuenta</label>
                <input type="text" value="<?php echo $cliente_numero_cuenta_seleccionado; ?>" name="numero_cuenta" maxlength="20" minlength="20" pattern="[0-9]+" title="Por favor, ingresa solo números" autocapitalize="off" required>
            </div>
            <div>
                <label for="apellido_materno">* Apellido materno</label>
                <input type="text" value="<?php echo $cliente_apellido_materno_seleccionado; ?>" name="apellido_materno" maxlength="20" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$" title="Por favor, ingresa solo letras y espacios" required autocomplete="off">
                <label for="codigo_postal">* Codigo postal</label>
                <input type="text" value="<?php echo $cliente_codigo_postal_seleccionado; ?>"name="codigo_postal" maxlength="5" minlength="5" pattern="[0-9]+" title="Por favor, ingresa solo números" autocapitalize="off" required>
                <label for="sexo">* Sexo</label>
                <select name="sexo" id="">
                    <option value="0" <?php if($cliente_sexo_seleccionado == 0){ echo "selected"; } ?> >Masculino</option>
                    <option value="1" <?php if($cliente_sexo_seleccionado == 1){ echo "selected"; } ?>>Femenino</option>
                </select>
                <label for="tipo_cuenta_bancaria">* Tipo de cuenta</label>
                <select name="tipo_cuenta_bancaria">
                    <option value="0" <?php if($cliente_tipo_cuenta_bancaria_seleccionado == 0){ echo "selected"; } ?>>Cuenta corriente</option>
                    <option value="1" <?php if($cliente_tipo_cuenta_bancaria_seleccionado == 1){ echo "selected"; } ?>>Cuenta de ahorros</option>
                    <option value="2" <?php if($cliente_tipo_cuenta_bancaria_seleccionado== 2){ echo "selected"; } ?>>Cuenta de depósito a plazo</option>
                    <option value="3" <?php if($cliente_tipo_cuenta_bancaria_seleccionado == 3){ echo "selected"; } ?>>Cuenta conjunta</option>
                </select>
            </div>
        </div>
        <div class="contenedor_botones">
            <button type="submit" name="editar">Editar</button>
            <a href="lista_clientes.php">
                <p>Cancelar</p>
            </a>
        </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/cambiar_foto_dinamico.js""></script>
  
</body>

</html>