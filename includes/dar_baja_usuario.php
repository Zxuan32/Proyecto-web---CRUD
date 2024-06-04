<?php
    include '../config/conexion.php';
    $id = $_POST['id'];

    $consulta = mysqli_query($conn, "SELECT id FROM usuarios WHERE concat(tipo_usuario,id) = '$id'");
    $resultado = mysqli_fetch_array($consulta);
    
    $id = $resultado['id'];
    
    $consulta = "UPDATE usuarios SET estatus = '0' WHERE usuarios.id = '$id'";
    $resultado = mysqli_query($conn, $consulta);
    
    $conn->close();
    header('Location: ../public_html/lista_usuarios.php');
    die();
?>