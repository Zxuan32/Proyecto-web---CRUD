<?php
    include '../config/conexion.php';
    $id = $_POST['id'];

    $consulta = mysqli_query($conn, "DELETE FROM clientes WHERE concat(tipo_usuario,id) = '$id'");

    $conn->close();
    header('Location: ../public_html/lista_clientes.php');
    die();
?>