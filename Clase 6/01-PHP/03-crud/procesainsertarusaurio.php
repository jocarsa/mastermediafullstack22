<?php
    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = "
        INSERT INTO usuarios
        VALUES(
            NULL,
            '".$_POST['usuario']."',
            '".$_POST['contrasena']."',
            '".$_POST['nombrecompleto']."'
        )
    ";
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    mysqli_query($mysqli, $query);
    // Vuelvo a la pantalla anterior
    header('Location: usuariosleer.php');

?>