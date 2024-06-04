<?php
    include '../config/conexion.php';
    $id = $_POST['id'];

    $consulta = mysqli_query($conn, "DELETE FROM proveedores WHERE id = '$id'");

    $conn->close();
    header('Location: ../public_html/lista_proveedores.php');
    die();
?>