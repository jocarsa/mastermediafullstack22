<?php session_start() ?>
<?php
    $enlace = mysqli_connect("localhost", "tiendaonline", "tiendaonline", "tiendaonline");
    mysqli_set_charset($enlace, "utf8mb4");
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Tienda online</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="logo">
            <h1>Tienda online</h1>
            <h2>Tienda de camisas</h2>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="productos.php">
                            Productos
                        </a>
                    </li>
                    <li>
                        <a href="carrito.php">
                            Carrito
                        </a>
                    </li>
                    <li>
                        <a href="contacto.php">
                            Contacto
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <main>
        