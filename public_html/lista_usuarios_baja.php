<?php
session_start();
include '../config/conexion.php';
include '../includes/saludo.php';
include '../includes/datos_sesion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/plantilla.css">
    <link rel="stylesheet" href="css/lista_usuarios_baja.css">
    <title>Inicio</title>
</head>

<body>
    <nav>
        <a href="" class="gameverse">
            <img src="../assets/img/gameverse.png" alt="">
            <p>GameVerse</p>
        </a>

        <ul>
            <li><a href="#" class="pagina_actual">Usuarios</a></li>
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
                    <?php echo $resultado['nombre'] . " " . $resultado['apellido_paterno']?>
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
    <form method="post">
        <p class="titulo">Lista de usuarios</p>
        <select name="opcion">
            <option value="id">Id</option>
            <option value="apellidos">Nombre</option>
            <option value="correo">Correo</option>
        </select>
        <input type="text" placeholder="Busquemos a alguien..." name="busqueda">
        <button type="submit" name="buscar"></button>
        <?php
        if ($resultado['tipo_usuario'] == 'ADM') {
            echo "
                    <a href='formulario_crear_usuario.php'>
                        <img src='../assets/img/crear.png'>
                        <p>Crear nuevo</p>
                    </a>
                    ";
        } else {
            echo "
                    <div class='aux'></div>
                    ";
        }
        ?>
        <a href="lista_usuarios.php" id="btn_ocultar">
            <img src="../assets/img/ver.png">
            <p>Ver Activos</p>
        </a>

    </form>
    <div class="principal">
        <table class="table table-hover table-bordered table-sm table-striped">
            <?php include '../includes/listar_usuarios_baja.php' ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <?php $conn->close(); ?>
</body>

</html>