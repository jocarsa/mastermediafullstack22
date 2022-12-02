<?php

    $cadena = "hola";
    $codificado = base64_encode($cadena);
    echo $cadena;
    echo "<br>";
    echo $codificado;
    echo "<br>";
    $descodificado = base64_decode($codificado);
    echo $descodificado;
?>