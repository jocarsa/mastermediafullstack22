<?php

    function codifica($cadena){
        return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($cadena)))));
    }
    function descodifica($cadena){
        return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($cadena)))));
    }
    $cadena = "mastermedia";
    echo $cadena;
    echo "<br>";
    $codificado = codifica($cadena);
    echo $codificado;
    $descodificado = descodifica($codificado);
    echo "<br>";
    echo $descodificado;
?>