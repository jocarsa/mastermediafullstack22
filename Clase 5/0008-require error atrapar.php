<?php
    try{
        require "0003-incluido.php";
        echo "Que sepas que tu edad es de ".$edad;
        
    }catch(Exception $e){
        echo "Ha habido un error";
    }
    echo "Continúo con el programa";
?>