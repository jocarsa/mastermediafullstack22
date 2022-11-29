<?php
    $string = file_get_contents("0001archivo.xml");
    $xml = simplexml_load_string($string);
    var_dump($xml);
    echo "<hr>";    
    echo $xml->datospersonales->dato[0];
    echo $xml->datospersonales->dato[1];
?>