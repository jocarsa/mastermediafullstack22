<?php

    //$edad = 45;
    
    if(isset($edad)){
        echo "Tu edad es de ".$edad;
    }
    if(!isset($edad)){
        echo "La variable que has intentado usar no existe";
    }
     echo "Continuo ejecutando el programa";
?>