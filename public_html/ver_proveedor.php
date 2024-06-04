<?php
session_start();
include '../config/conexion.php';
include '../includes/saludo.php';
include '../includes/datos_proveedor_seleccionado.php';
include '../includes/datos_sesion.php';
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
    <link rel="stylesheet" href="css/editar_proveedor.css">
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
    <form method="post" enctype="multipart/form-data" class="contenedor_proveedor" >
            <div class="header">
                <p>Datos del proveedor</p>
            </div>
            <div class="contenedor_foto">
                <img src="<?php echo '../'.$foto_proveedor;?>" id="foto">
            </div>
            <div class="contenedor_inputs">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" value="<?php echo $nombre_proveedor;?>" disabled>
                    <label for="calle">Calle</label>
                    <input type="text" value="<?php echo $calle_proveedor;?>" disabled>
                    <label for="ruc_proveedor">RUC</label>
                    <input type="text" value="<?php echo $ruc_proveedor;?>" disabled>
                </div>
                <div>
                    <label for="telefono">Telefono</label>
                    <input type="text" value="<?php echo $telefono_proveedor;?>"disabled>
                    <label for="colonia">Colonia</label>
                    <input type="text" value="<?php echo $colonia_proveedor;?>" disabled>
                    <label for="correo">Correo</label>
                    <input type="email" value="<?php echo $correo_proveedor;?>" disabled>
                </div>
            </div>
            <div class="contenedor_boton">
                <a href="lista_proveedores.php" class="btn_cancelar"><p>Volver</p></a>
            </div>
        </form>
        <div class="contenedor_productos">
            <div class="header">
                <p>Productos del proveedor</p>
            </div>
            <div class="lista_productos">
                 <?php include '../includes/productos_proveedor_seleccionado.php'; ?>
            </div>
            <div class="contenedor_boton_producto">
                <button class="btn_guardar">Agregar producto</button>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="js/cambiar_foto_dinamico.js""></script>
  
</body>

</html>