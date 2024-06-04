<?php
//Se obtiene la id desde la url para buscar al usuario que se selecciono
$id_usuario_seleccionado = $_GET['id'];
//si por alguna razon borran la id redirige a la lista
if ($id_usuario_seleccionado == "" || $id_usuario_seleccionado == null) {
    echo "<script>window.location.href = 'lista_usuarios.php'</script>";
} else {
    //se realiza la consulta para traer los datos del usuario 
    $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '$id_usuario_seleccionado'");
    $resultado = mysqli_fetch_array($consulta);
    //se asignan los valores para mostrar
    $nombre_usuario_seleccionado = $resultado['nombre'];
    $apellido_paterno_usuario_seleccionado = $resultado['apellido_paterno'];
    $apellido_materno_usuario_seleccionado = $resultado['apellido_materno'];
    $edad_usuario_seleccionado = $resultado['edad'];
    $sexo_usuario_seleccionado = $resultado['sexo'];
    $rfc_usuario_seleccionado = $resultado['rfc'];
    $calle_usuario_seleccionado = $resultado['calle'];
    $colonia_usuario_seleccionado = $resultado['colonia'];
    $telefono_usuario_seleccionado = $resultado['telefono'];
    $correo_usuario_seleccionado = $resultado['correo'];
    $usuario_usuario_seleccionado = $resultado['usuario'];
    $clave_acceso_usuario_seleccionado = $resultado['clave_acceso'];
    $tipo_usuario_usuario_seleccionado = $resultado['tipo_usuario'];
    $estatus_usuario_seleccionado = $resultado['estatus'];
    $fecha_registro_usuario_seleccionado = $resultado['fecha_registro'];
    $foto_perfil_usuario_seleccionado = $resultado['foto_perfil'];

    //Dar formato a los datos necesaios
    if($estatus_usuario_seleccionado == 0) {
        $estatus_usuario_seleccionado = "Inactivo";
        $estilo = "style='background-color: #bf1f1f '";
    }
    else{
        $estatus_usuario_seleccionado = "Activo";
        $estilo = "";
    }
    if($tipo_usuario_usuario_seleccionado == "ADM"){
        $tipo_usuario_usuario_seleccionado = "Administrador";
    }
    else{
        $tipo_usuario_usuario_seleccionado = "Cajero";
    }
}
?>