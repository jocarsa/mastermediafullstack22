<?php

    $persona[0] = "Juan";
    $persona[1] = "Jose";
    $persona[2] = "Jorge";

    $serializado = "{";
    for($i = 0;$i<count($persona);$i++){
        $serializado .= '"persona'.$i.'":"'.$persona[$i].'",';
    }
    
    $serializado .= '"a":"b"}';
    echo $serializado;

?>