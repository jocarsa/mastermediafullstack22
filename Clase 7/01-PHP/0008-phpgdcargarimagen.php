<?php
    // Carga una imagen y me la pone en una variable
    $miimagen = imagecreatefromjpeg("josevicente.jpg");
    // Cargo la imagen en el navegador
    header('Content-Type: image/jpeg');
    // Muestro la imagen en pantalla
    imagejpeg($miimagen);
    // Destruyo la imagen en la memoria
    imagedestroy($miimagen);
?>