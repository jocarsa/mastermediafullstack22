<?php
    $imagen = imageCreateTrueColor(400,400);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    $verde = imagecolorallocate($imagen, 0, 255, 0);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen,0,0,$blanco);
    imagerectangle($imagen, 50, 50, 150, 150, $rojo);
    imagefilledrectangle($imagen, 250, 250, 150, 150, $rojo);

    imagefilledellipse($imagen, 200, 150, 200, 200, $verde);

    header('Content-Type: image/jpeg');
    imagejpeg($imagen);
    imagedestroy($imagen);
?>