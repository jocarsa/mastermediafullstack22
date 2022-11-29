<?php
    $imagen = imageCreateTrueColor(400,400);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen,0,0,$blanco);
    
    // Primero la imagen en la que escribimos $imagen
    // El centro en x que es 200
    // El centro en Y que es 200
    // El diametro en X del circulo 300
    // El diametro en Y del circulo 300
    // Angulo desde el que empiezo a barrer 0
    // Angulo hasta el que barrer 180
    // Color $rojo
    // Estilo en funcion de las opciones que me da la documentacion
    imagefilledarc($imagen, 200, 200, 300, 300, 270 , 360, $rojo,IMG_ARC_PIE);
    
    header('Content-Type: image/jpeg');
    imagejpeg($imagen);
    imagedestroy($imagen);
?>