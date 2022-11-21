<!doctype html>
<html>
    <head>
    </head>
    <body>
        <form action="?" method="get">
            <input name="nombre" type="text">
            <input name="apellido" type="text">
            <input type="submit">
        </form>
    </body>
</html>

<?php
    if(isset($_GET['nombre'])){
        echo "el nombre que has enviado es ".$_GET['nombre']."<br>";
        echo "el apellido que has enviado es ".$_GET['apellido']."<br>";
    }
?>