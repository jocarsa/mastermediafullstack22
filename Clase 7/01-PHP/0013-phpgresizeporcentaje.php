<?php
// File and new size
$archivo = 'josevicente.jpg';
$porcentaje = 0.3;

// Get new sizes
$anchura = getimagesize($archivo)[0];
$altura = getimagesize($archivo)[1];
$anchuradestino = round($anchura*$porcentaje);
$alturadestino = round($altura*$porcentaje);

// Load
$imagenpequena = imagecreatetruecolor($anchuradestino, $alturadestino);
$imagenoriginal = imagecreatefromjpeg($archivo);

// Resize
imagecopyresized($imagenpequena, $imagenoriginal, 0, 0, 0, 0, $anchuradestino, $alturadestino, $anchura, $altura);

// Output
imagejpeg($imagenpequena,"miniatura.jpg");
?>