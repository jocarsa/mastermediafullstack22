<?php session_start() ?>
<?php
    $enlace = mysqli_connect("localhost", "intranet", "intranet", "intranet");
    mysqli_set_charset($enlace, "utf8mb4");
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Intranet</title>
        <meta charset="utf-8">
        <link rel="Stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="logo">
            <h1>Intranet</h1>
            <h2>Aplicacion social</h2>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="iniciasesion.php">
                            Iniciar sesion
                        </a>
                    </li>
                    <li>
                        <a href="creausuario.php">
                            Nuevo usuario
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <main>
        