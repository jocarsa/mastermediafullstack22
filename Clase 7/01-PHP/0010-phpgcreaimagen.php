<?php
    $imagen = imageCreateTrueColor(400,400);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    imageSetPixel($imagen, 0,0, $rojo);
    ImagePNG($imagen,"guarda.png");
?>