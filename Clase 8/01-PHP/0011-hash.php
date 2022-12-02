<?php

    $cadena = "hola";

    echo $cadena;
    echo "<br>";
    $hash1 = md5($cadena);
    echo $hash1;
    echo "<br>";
    $hash2 = sha1($cadena);
    echo $hash2;
    echo "<br>";

?>