<?php
    
    $datos = [34,54,234,32,5,65];

    $radiocompleto = 360;
    $sumadelosnumeros = 0;
    for($i = 0;$i<count($datos);$i++){$sumadelosnumeros+=$datos[$i];}
    

    $imagen = imageCreateTrueColor(600,400);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen,0,0,$blanco);
    $anguloinicio = 0;
    for($i = 0;$i<count($datos);$i++){
        // Primero la imagen en la que escribimos $imagen
        // El centro en x que es 200
        // El centro en Y que es 200
        // El diametro en X del circulo 300
        // El diametro en Y del circulo 300
        // Angulo desde el que empiezo a barrer 0
        // Angulo hasta el que barrer 180
        // Color $rojo
        // Estilo en funcion de las opciones que me da la documentacion

        imagefilledarc(
            $imagen, 
            200, 
            200, 
            300, 
            300, 
            $anguloinicio , 
            $anguloinicio+($radiocompleto/$sumadelosnumeros)*$datos[$i], 
            imagecolorallocate($imagen, rand(0,255), rand(0,255), rand(0,255)),
            IMG_ARC_PIE);
        $anguloinicio += ($radiocompleto/$sumadelosnumeros)*$datos[$i];
    }
    imagefilledellipse($imagen, 200, 200, 100, 100, $blanco);
    header('Content-Type: image/jpeg');
    imagejpeg($imagen);
    imagedestroy($imagen);
?>