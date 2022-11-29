<?php
// File and new size
$archivo = 'josevicente.jpg';


// Get new sizes
$anchura = getimagesize($archivo)[0];
$altura = getimagesize($archivo)[1];
$anchuradestino = 100;
$alturadestino = 100;

// Load
$imagenpequena = imagecreatetruecolor($anchuradestino, $alturadestino);
$imagenoriginal = imagecreatefromjpeg($archivo);

// Resize
imagecopyresized($imagenpequena, $imagenoriginal, 0, 0, 0, 0, $anchuradestino, $alturadestino, $anchura, $altura);

// Output
imagejpeg($imagenpequena,"miniatura.jpg");
?>