<?php

    $serializado = "Juan|Jose|Jorge|";
    
    $explotado = explode("|",$serializado);
    for($i = 0;$i<count($explotado);$i++){
        echo "El elemento numero ".$i." de la matriz es ".$explotado[$i]."<br>";
    }

?>