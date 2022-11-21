<?php

    $diadelasemana = "lunes";

    switch($diadelasemana){
        case "lunes":
            echo "Hoy es el peor día de la semana";
            break;
        case "martes":
            echo "Hoy es el segundo peor día de la semana";
            break;
        case "miércoles":
            echo "Ya estamos a mitad de semana";
            break;
        case "jueves":
            echo "Casi es viernes";
            break;
        case "viernes":
            echo "Hoy todo el mundo tiene prisa";
            break;
        case "sábado":
            echo "Hoy es el mejor día de la semana";
            break;
        case "domingo":
            echo "Parece mentira que mañana sea lunes";
            break;
        default:
            echo "Lo que has introducido no es un día";
    }

?>