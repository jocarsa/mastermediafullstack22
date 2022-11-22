<?php
    // Guardo la cadena original
    $cadena = "Esta es una cadena";
    // Con strlen puedo saber cual es la longitud de la cadena
    echo "La longitud de la cadena es de: ".strlen($cadena)." caracteres<br>";
    // Recorro uno a uno los caracteres de la cadena
    for($i = 0;$i<strlen($cadena);$i++){
        // Para cada caracter, lo saco por pantalla y le encadeno un guión
        echo $cadena[$i]."-";
    }

?>