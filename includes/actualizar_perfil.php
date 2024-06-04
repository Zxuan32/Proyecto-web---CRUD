<?php
if (isset($_POST['guardar'])) {
    //Se sacan todos los valores de los inputs
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_apellido_paterno = $_POST['apellido_paterno'];
    $nuevo_apellido_materno = $_POST['apellido_materno'];
    $nuevo_edad = $_POST['edad'];
    $nuevo_sexo = $_POST['sexo'];
    $nuevo_rfc = strtoupper($_POST['rfc']);
    $nuevo_calle = $_POST['calle'];
    $nuevo_colonia = $_POST['colonia'];
    $nuevo_telefono = $_POST['telefono'];
    $nuevo_correo = $_POST['correo'];
    $nuevo_usuario = $_POST['usuario'];
    $nuevo_clave_acceso = $_POST['clave_acceso'];

    //Si todos los campos son iguales muestra un mensaje de que no se realizaron cambios
    if (
        $nuevo_nombre == $nombre &&
        $nuevo_apellido_paterno == $apellido_paterno &&
        $nuevo_apellido_materno == $apellido_materno &&
        $nuevo_edad == $edad &&
        $nuevo_sexo == $sexo &&
        $nuevo_rfc == $rfc &&
        $nuevo_calle == $calle &&
        $nuevo_colonia == $colonia &&
        $nuevo_telefono == $telefono &&
        $nuevo_correo == $correo &&
        $nuevo_usuario == $usuario &&
        $nuevo_clave_acceso == $clave_acceso &&
        $_FILES["foto_usuario"]['size'] == 0
    ) {
        echo "Sin cambios por hacer xc";
    }
    //Si se realizo un cambio en algun campo
    else {
        //si el usuario fue el que cambio se realiza una validacion para que no se use otro usuario ya existente
        if ($nuevo_usuario != $usuario) {
            $consulta = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE LOWER(usuario) = LOWER('$nuevo_usuario')");
            if ($consulta->num_rows > 0) {
                echo "El nombre de usuario ya esta en uso";
            } else {
                $actualizar = "usuario";
                actualizar($conn, $actualizar, $nuevo_usuario, $id);
                $usuario = $nuevo_usuario;
            }
        }
        //Si el correo fue el que se cambio se aplica la misma logica
        if ($nuevo_correo != $correo) {
            $consulta = mysqli_query($conn, "SELECT correo FROM usuarios WHERE correo = '$nuevo_correo'");
            if ($consulta->num_rows > 0) {
                echo "El correo ya esta en uso";
            } else {
                $actualizar = "correo";
                actualizar($conn, $actualizar, $nuevo_correo, $id);
                $correo = $nuevo_correo;
            }
        }
        //Si el rfc fue el que se cambio de igual manera se aplica lo mismo
        if ($nuevo_rfc != $rfc) {
            $consulta = mysqli_query($conn, "SELECT rfc FROM usuarios WHERE rfc = '$nuevo_rfc'");
            if ($consulta->num_rows > 0) {
                echo "El rfc ya esta en uso";
            } else {
                $actualizar = "rfc";
                actualizar($conn, $actualizar, $nuevo_rfc, $id);
                $rfc = $nuevo_rfc;
            }
        }
        if($_FILES["foto_usuario"]['size'] != 0){
            $imagen = $_FILES['foto_usuario']['tmp_name'];
            $nombre_imagen = $_FILES['foto_usuario']['name'];
            $ruta = 'uploads/usuarios/'.$usuario.$nombre_imagen;
            move_uploaded_file($imagen, '../' . $ruta);
            $actualizar = 'foto_perfil';
            actualizar($conn, $actualizar, $ruta, $id);
            $foto_perfil = $ruta;
        }
       
        $consulta = mysqli_query($conn, "UPDATE usuarios SET 
            nombre = '$nuevo_nombre', 
            apellido_paterno = '$nuevo_apellido_paterno', 
            apellido_materno = '$nuevo_apellido_materno', 
            edad = '$nuevo_edad', sexo = '$nuevo_sexo', 
            calle = '$nuevo_calle', 
            colonia = '$nuevo_colonia', 
            telefono = '$nuevo_telefono', 
            clave_acceso = '$nuevo_clave_acceso' 
            WHERE id = '$id'");

        //actualizar en las textbox
        $nombre = $nuevo_nombre;
        $apellido_paterno = $nuevo_apellido_paterno;
        $apellido_materno = $nuevo_apellido_materno;
        $edad = $nuevo_edad;
        $sexo = $nuevo_sexo;
        $calle = $nuevo_calle;
        $colonia = $nuevo_colonia;
        $telefono = $nuevo_telefono;
        $clave_acceso = $nuevo_clave_acceso;

    }
}
function actualizar($conexion, $actualizar, $dato_actualizar, $id)
{
    $consulta = mysqli_query($conexion, "UPDATE usuarios SET $actualizar = '$dato_actualizar' WHERE id = '$id'");
    echo "Datos actualizados correctamente";
}
?>