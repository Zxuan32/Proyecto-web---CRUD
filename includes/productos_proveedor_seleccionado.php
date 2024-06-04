<?php
$consulta = mysqli_query($conn,"SELECT productos.* FROM productos JOIN proveedores ON productos.id_proveedor = proveedores.id WHERE proveedores.id = '$id_proveedor'");
$precio = "";
if ($consulta->num_rows > 0) {
    while ($producto = $consulta->fetch_array()) {
        if($producto['descuento'] != 0){
            $costo_final = ($producto['precio'] - ($producto['descuento'] / 100) * $producto['precio']);
            $precio = "<strong>Precio: </strong> <span class='precio_original'>$".$producto['precio']."</span>$".number_format($costo_final,2)."<span class='descuento'>".$producto['descuento']."% OFF</span> ";
        }
        else{
            $precio = "<strong>Precio: $</strong>".$producto['precio'];
        }
        echo "
        <article class='juego'>
            <img src='../".$producto['imagen']."' alt=''>
            <div class='datos'>
                <p class='titulo'><strong>".$producto['nombre']."</strong></p>
                <p class='categoria'><strong>Categoria: </strong>".$producto['categoria']."</p>
                <p class='existencias'><strong>Existencias: </strong>".$producto['existencias']."</p>
                <p class='precio'>".$precio."</p>
            </div>
        </article>
        ";
    }
}
else{
    echo "
    <div class='no_productos'>
        <img src='../assets/img/no_producto.png' alt=''>
        <p>Aun no hay productos registrados</p>
    </div>
    ";
}
?>