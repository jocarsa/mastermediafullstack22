<?php

    $agenda[0]['nombre'] = "Pepe";
    $agenda[0]['correo'] = "pepe@pepe.com";
    $agenda[0]['telefono'] = "5235435235";

    $agenda[1]['nombre'] = "Juan";
    $agenda[1]['correo'] = "juan@juan.com";
    $agenda[1]['telefono'] = "5235435235";

    $agenda[2]['nombre'] = "Jose";
    $agenda[2]['correo'] = "jose@jose.com";
    $agenda[2]['telefono'] = "5235435235";

    /*
    for($i = 1;$i<30;$i++){
        echo "Que sepas que hoy es el dia ".$i." del mes<br>";
    }
    */
    for($i = 0;$i<count($agenda);$i++){
        echo $agenda[$i]['nombre'];
        echo "<br>";
        echo $agenda[$i]['correo'];
        echo "<br>";
        echo $agenda[$i]['telefono'];
        echo "<br><br>";
    }
?>