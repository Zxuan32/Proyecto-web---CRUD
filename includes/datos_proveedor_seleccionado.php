<?php
$id_proveedor = $_GET['id'];
if ($id_proveedor == "" || $id_proveedor == null) {
    echo "<script>window.location.href = 'lista_proveedores.php'</script>";
} else {
    $consulta = mysqli_query($conn, "SELECT * FROM proveedores WHERE id = '$id_proveedor'");
    $resultado = mysqli_fetch_array($consulta);

    $nombre_proveedor = $resultado['nombre'];
    $telefono_proveedor = $resultado['telefono'];
    $calle_proveedor = $resultado['calle'];
    $colonia_proveedor = $resultado['colonia'];
    $ruc_proveedor = $resultado['ruc_proveedor'];
    $correo_proveedor = $resultado['correo'];
    $foto_proveedor = $resultado['foto_proveedor'];
    $fecha_registro_proveedor = $resultado['fecha_registro'];
}
?>
