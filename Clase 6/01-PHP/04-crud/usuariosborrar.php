<?php
    
    echo "Voy a borrar el usuario: ".$_GET['id'];
    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero eliminar un usuario concreto
    $query = "DELETE FROM usuarios WHERE Identificador = ".$_GET['id']."";
    echo $query;
    // Ejecuto la petición contra la base de datos
    mysqli_query($mysqli, $query);
    // Vuelvo a la pantalla anterior
    header('Location: usuariosleer.php');
?>