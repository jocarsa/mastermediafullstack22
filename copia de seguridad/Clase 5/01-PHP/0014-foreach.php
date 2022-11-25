<?php
    
    $personas[0] = "Juan";
    $personas[1] = "Javier";
    $personas[2] = "Jorge";
    $personas[3] = "Jose";

    for($i = 0;$i<count($personas);$i++){
        echo $personas[$i]."<br>";
    }

    echo "<hr>";

    foreach($personas as $persona){
        echo $persona."&nbsp;";
    }


?>