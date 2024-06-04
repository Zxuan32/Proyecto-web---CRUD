<?php
//Se obtiene la id desde la url para buscar al usuario que se selecciono
$cliente_id_seleccionado = $_GET['id'];
//si por alguna razon borran la id redirige a la lista
if ($cliente_id_seleccionado == "" || $cliente_id_seleccionado == null) {
    echo "<script>window.location.href = 'lista_clientes.php'</script>";
} else {
    $consulta = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$cliente_id_seleccionado'");
    $resultado = mysqli_fetch_array($consulta);

    $cliente_nombre_seleccionado = $resultado['nombre'];
    $cliente_apellido_paterno_seleccionado = $resultado['apellido_paterno'];
    $cliente_apellido_materno_seleccionado = $resultado['apellido_materno'];
    $cliente_calle_seleccionado = $resultado['calle'];
    $cliente_colonia_seleccionado = $resultado['colonia'];
    $cliente_codigo_postal_seleccionado = $resultado['codigo_postal'];
    $cliente_telefono_seleccionado = $resultado['telefono'];
    $cliente_correo_seleccionado = $resultado['correo'];
    $cliente_sexo_seleccionado = $resultado['sexo'];
    $cliente_banco_seleccionado = $resultado['banco'];
    $cliente_numero_cuenta_seleccionado = $resultado['numero_cuenta'];
    $cliente_tipo_cuenta_bancaria_seleccionado = $resultado['tipo_cuenta_bancaria'];
}
?>