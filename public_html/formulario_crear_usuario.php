<?php
session_start();
include '../config/conexion.php';
include '../includes/saludo.php';
include '../includes/datos_sesion.php';
include '../includes/crear_usuario.php';
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
    <link rel="stylesheet" href="css/editar_usuario.css">
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
        <form method="post" enctype="multipart/form-data">
            <div class="contenedor_datos_generales">
                <div class="header">
                    <p>Foto de perfil</p>
                </div>
                <img src="../assets/img/default.jpg" id="foto">
                <input type="file" name="foto_usuario" id="foto_usuario" accept="image/*"><br>
                <label for="foto_usuario" class="boton_subir_foto">
                    <p>Subir foto de perfil</p>
                </label>
            </div>
            <div class="contenedor_datos_editar">
                <div class="header">
                    <p>Datos personales</p>
                </div>
                <div class="contenedor_datos_personales">
                    <div>
                        <label for="nombre">Nombres</label>
                        <input type="text" name="nombre" maxlength="20" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$"
                            title="Por favor, ingresa solo letras y espacios" required autocomplete="off" value="<?php echo $nuevo_nombre; ?>"> <br>
                        <label for="apellido_paterno">Apellido paterno</label>
                        <input type="text" name="apellido_paterno" maxlength="10" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$"
                            title="Por favor, ingresa solo letras y espacios" required autocomplete="off" value="<?php echo $nuevo_apellido_paterno; ?>"><br>
                        <label for="apellido_materno">Apellido materno</label>
                        <input type="text" name="apellido_materno" maxlength="10" pattern="^[a-zA-ZÁáÉéÍíÓóÚúÜüÑñ\s]+$"
                            title="Por favor, ingresa solo letras y espacios" required autocomplete="off" value="<?php echo $nuevo_apellido_materno; ?>"><br>
                        <label for="edad">Edad</label>
                        <input type="text" name="edad" maxlength="2" pattern="[0-9]+"
                            title="Por favor, ingresa solo números" required autocomplete="off" value="<?php echo $nuevo_edad; ?>"><br>
                        <label for="sexo">Sexo</label>
                        <select name="sexo" id="">
                            <option value="0" <?php if($nuevo_sexo == 0){ echo "selected";}?> >Masculino
                            </option>
                            <option value="1" <?php if($nuevo_sexo == 1){ echo "selected";}?>>Femenino
                            </option>
                        </select><br>
                        <label for="rfc">RFC</label>
                        <input type="text" name="rfc" autocomplete="off" placeholder="<?php echo $placeHolder_rfc; ?>" maxlength="13" minlength="13" pattern="[a-zA-Z0-9]+" title="RFC no valido" required value="<?php echo $nuevo_rfc; ?>"><br>
                    </div>
                </div>
                <div class="contenedor_domicilio">
                    <p>Domicilio</p>
                    <div>
                        <input type="text" name="calle" placeholder="Calle" autocomplete="off" maxlength="30" required value="<?php echo $nuevo_calle; ?>">
                        <input type="text" name="colonia" placeholder="Colonia" autocomplete="off" maxlength="30" pattern="[a-zA-Z\s]+" title="Por favor, ingresa solo letras y espacios" required value="<?php echo $nuevo_colonia; ?>">
                    </div>
                </div>
                <div class="contenedor_contacto">
                    <div>
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" required placeholder="<?php echo $placeHolder_correo; ?>" value="<?php echo $nuevo_correo; ?>">
                    </div>
                    <div>
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" maxlength="10" minlength="10" pattern="[0-9]+" title="Por favor, ingresa solo números" required value="<?php echo $nuevo_telefono; ?>">
                    </div>
                </div>
            </div>
            <div class="contenedor_datos_configuracion">
                <div class="header">
                    <p>Configuracion de la cuenta</p>
                </div>
                <div class="contenedor_configuracion">
                    <label for="usuario">Usuario</label><br>
                    <input type="text" name="usuario" maxlength="10" required placeholder="<?php echo $placeholder_usuario; ?>" value="<?php echo $nuevo_usuario; ?>">
                    <label for="clave_acceso">Contraseña</label><br>
                    <input type="password" name="clave_acceso" maxlength="10" required value="<?php echo $nuevo_clave_acceso; ?>">
                    <label for="tipo_usuario">Rol</label><br>
                    <select name="tipo_usuario" id="">
                        <option value="CAJ" <?php if($nuevo_tipo_usuario == 'CAJ'){ echo "selected";}?>>Cajero</option>
                        <option value="ADM" <?php if($nuevo_tipo_usuario == 'ADM'){ echo "selected";}?>>Administrador</option>
                    </select>
                </div>
                <div class="botones">
                    <button type="submit" name="guardar">Crear</button>
                    <a href="lista_usuarios.php">
                        <p>Cancelar</p>
                    </a>
                </div>
            </div>
        </form>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="js/cambiar_foto_dinamico.js""></script>
  
</body>

</html>