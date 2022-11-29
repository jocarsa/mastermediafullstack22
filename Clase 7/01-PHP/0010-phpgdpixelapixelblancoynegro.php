<?php
    // Carga una imagen y me la pone en una variable
    $miimagen = imagecreatefromjpeg("josevicente.jpg");
    $rgb = imagecolorat($miimagen, 1, 1);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    $rojo = imagecolorallocate($miimagen, 255, 0, 0);
    imagesetpixel($miimagen, 2,2, $rojo);
    // Creo una nueva imagen
    $imagen = imageCreateTrueColor(400,400);
    for($x = 0;$x<400;$x++){
        for($y = 0;$y<400;$y++){
            $rgb = imagecolorat($miimagen, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $gris = round(($r+$g+$b)/3);
            $color = imagecolorallocate($imagen, $gris, $gris, $gris);
            imageSetPixel($imagen, $x,$y, $color);
        } 
    }
    ImagePNG($imagen,"guarda.png");
    // Destruyo la imagen en la memoria
    imagedestroy($imagen);
?>