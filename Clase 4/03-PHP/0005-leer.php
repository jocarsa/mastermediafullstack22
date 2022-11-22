<?php
// Abro un archivo
$miarchivo = fopen("miarchivo.txt", "r");
// Uso un bucle while para leer una a una las lineas del archivo
// Mientras que no llegue al final del archivo
while(!feof($miarchivo)) {
  echo fgets($miarchivo) . "<br>"; // Lee una a una las lineas del archivo
} 
// Al final cierro el archivo
fclose($miarchivo);
?>