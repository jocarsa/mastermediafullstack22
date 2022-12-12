<?php include "inc/cabecera.php" ?>

<?php

// Incluyo el  producto pedido en el array de carrito
$producto = new Producto(
    $_POST['producto'],
    $_POST['unidades']
);
array_push($_SESSION['carrito'],$producto);
echo "<p>Tu producto se ha añadido al carrito</p>"

?>

<?php include "inc/piedepagina.php" ?>