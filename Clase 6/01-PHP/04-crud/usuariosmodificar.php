<?php
    include "funciones.php";
    miConsola("Que sepas que el id que voy a modificar es ".$_GET['id']);

    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = "SELECT * FROM usuarios WHERE Identificador = ".$_GET['id'];
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    $result = mysqli_query($mysqli, $query);
    // Ahora quiero obtener los usuarios en pantalla en forma de tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
           <form action="procesaactualizarusuario.php" method="POST">
                <input type="hidden" name="Identificador" value="'.$row['Identificador'].'">
                <input type="text" name="usuario" placeholder="Indica tu usuario" value="'.$row['usuario'].'">
                <input type="password" name="contrasena" placeholder="Indica tu contraseña" value="'.$row['contrasena'].'">
                <input type="text" name="nombrecompleto" placeholder="Indica tu nombre completo" value="'.$row['nombrecompleto'].'">
                <input type="submit">
            </form>
        ';
    }

?>