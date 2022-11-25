<!doctype html>
<html>
    <head>
    </head>
    <body>
        <form action="?" method="post">
            <input name="nombre" type="text">
            <input name="apellido" type="text">
            <input type="submit">
        </form>
    </body>
</html>

<?php
    if(isset($_POST['nombre'])){
        echo "el nombre que has enviado es ".$_POST['nombre']."<br>";
        echo "el apellido que has enviado es ".$_POST['apellido']."<br>";
    }
?>