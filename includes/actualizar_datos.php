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
    $nuevo_tipo_usuario = $_POST['tipo_usuario'];
    $nuevo_estatus = $_POST['estatus'];

    //Dar formato a los datos necesaios
    if ($nuevo_estatus == 0) {
        $nuevo_estatus = "Inactivo";
        $estilo = "style='background-color: #bf1f1f '";
    } else {
        $nuevo_estatus = "Activo";
        $estilo = "";
    }
    if ($nuevo_tipo_usuario == "ADM") {
        $nuevo_tipo_usuario = "Administrador";
    } else {
        $nuevo_tipo_usuario = "Cajero";
    }
    //Si todos los campos son iguales muestra un mensaje de que no se realizaron cambios
    if (
        $nuevo_nombre == $nombre_usuario_seleccionado &&
        $nuevo_apellido_paterno == $apellido_paterno_usuario_seleccionado &&
        $nuevo_apellido_materno == $apellido_materno_usuario_seleccionado &&
        $nuevo_edad == $edad_usuario_seleccionado &&
        $nuevo_sexo == $sexo_usuario_seleccionado &&
        $nuevo_rfc == $rfc_usuario_seleccionado &&
        $nuevo_calle == $calle_usuario_seleccionado &&
        $nuevo_colonia == $colonia_usuario_seleccionado &&
        $nuevo_telefono == $telefono_usuario_seleccionado &&
        $nuevo_correo == $correo_usuario_seleccionado &&
        $nuevo_usuario == $usuario_usuario_seleccionado &&
        $nuevo_clave_acceso == $clave_acceso_usuario_seleccionado &&
        $nuevo_tipo_usuario == $tipo_usuario_usuario_seleccionado &&
        $nuevo_estatus == $estatus_usuario_seleccionado &&
        $_FILES["foto_usuario"]['size'] == 0
    ) {
        echo "Sin cambios por hacer xc";
    }
    //Si se realizo un cambio en algun campo
    else {
        //si el usuario fue el que cambio se realiza una validacion para que no se use otro usuario ya existente
        if ($nuevo_usuario != $usuario_usuario_seleccionado) {
            $consulta = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE LOWER(usuario) = LOWER('$nuevo_usuario')");
            if ($consulta->num_rows > 0) {
                echo "El nombre de usuario ya esta en uso";
            } else {
                $actualizar = "usuario";
                actualizar($conn, $actualizar, $nuevo_usuario, $id_usuario_seleccionado);
                $usuario_usuario_seleccionado = $nuevo_usuario;
            }
        }
        //Si el correo fue el que se cambio se aplica la misma logica
        if ($nuevo_correo != $correo_usuario_seleccionado) {
            $consulta = mysqli_query($conn, "SELECT correo FROM usuarios WHERE correo = '$nuevo_correo'");
            if ($consulta->num_rows > 0) {
                echo "El correo ya esta en uso";
            } else {
                $actualizar = "correo";
                actualizar($conn, $actualizar, $nuevo_correo, $id_usuario_seleccionado);
                $correo_usuario_seleccionado = $nuevo_correo;
            }
        }
        //Si el rfc fue el que se cambio de igual manera se aplica lo mismo
        if ($nuevo_rfc != $rfc_usuario_seleccionado) {
            $consulta = mysqli_query($conn, "SELECT rfc FROM usuarios WHERE rfc = '$nuevo_rfc'");
            if ($consulta->num_rows > 0) {
                echo "El rfc ya esta en uso";
            } else {
                $actualizar = "rfc";
                actualizar($conn, $actualizar, $nuevo_rfc, $id_usuario_seleccionado);
                $rfc_usuario_seleccionado = $nuevo_rfc;
            }
        }
        if($_FILES["foto_usuario"]['size'] != 0){
            $imagen = $_FILES['foto_usuario']['tmp_name'];
            $nombre_imagen = $_FILES['foto_usuario']['name'];
            $ruta = 'uploads/usuarios/'.$usuario_usuario_seleccionado.$nombre_imagen;
            move_uploaded_file($imagen, '../' . $ruta);
            $actualizar = 'foto_perfil';
            actualizar($conn, $actualizar, $ruta, $id_usuario_seleccionado);
            $foto_perfil_usuario_seleccionado = $ruta;
        }
        //en la base de datos el estatus se referencia como un 0 para inactivo y 1 para activo em este momento estatus vale 'Activo'
        //regresamos el formato de 'Activo' a 0
        if ($nuevo_estatus == "Activo") {
            $nuevo_estatus = 1;
        } else {
            $nuevo_estatus = 0;
        }
        if ($nuevo_tipo_usuario == "Administrador") {
            $nuevo_tipo_usuario = "ADM";
        } else {
            $nuevo_tipo_usuario = "CAJ";
        }
        $consulta = mysqli_query($conn, "UPDATE usuarios SET 
            nombre = '$nuevo_nombre', 
            apellido_paterno = '$nuevo_apellido_paterno', 
            apellido_materno = '$nuevo_apellido_materno', 
            edad = '$nuevo_edad', sexo = '$nuevo_sexo', 
            calle = '$nuevo_calle', 
            colonia = '$nuevo_colonia', 
            telefono = '$nuevo_telefono', 
            clave_acceso = '$nuevo_clave_acceso', 
            tipo_usuario = '$nuevo_tipo_usuario', 
            estatus = '$nuevo_estatus'
            WHERE id = '$id_usuario_seleccionado'");

        //actualizar en las textbox
        $nombre_usuario_seleccionado = $nuevo_nombre;
        $apellido_paterno_usuario_seleccionado = $nuevo_apellido_paterno;
        $apellido_materno_usuario_seleccionado = $nuevo_apellido_materno;
        $edad_usuario_seleccionado = $nuevo_edad;
        $sexo_usuario_seleccionado = $nuevo_sexo;
        $calle_usuario_seleccionado = $nuevo_calle;
        $colonia_usuario_seleccionado = $nuevo_colonia;
        $telefono_usuario_seleccionado = $nuevo_telefono;
        $clave_acceso_usuario_seleccionado = $nuevo_clave_acceso;
        $tipo_usuario_usuario_seleccionado = $nuevo_tipo_usuario;
        $estatus_usuario_seleccionado = $nuevo_estatus;

        //Dar formato a los datos necesaios
        if ($estatus_usuario_seleccionado == 0) {
            $estatus_usuario_seleccionado = "Inactivo";
        } else {
            $estatus_usuario_seleccionado = "Activo";
            $estilo = "";
        }
        if ($tipo_usuario_usuario_seleccionado == "ADM") {
            $tipo_usuario_usuario_seleccionado = "Administrador";
        } else {
            $tipo_usuario_usuario_seleccionado = "Cajero";
        }
    }
}
function actualizar($conexion, $actualizar, $dato_actualizar, $id)
{
    $consulta = mysqli_query($conexion, "UPDATE usuarios SET $actualizar = '$dato_actualizar' WHERE id = '$id'");
}
?>