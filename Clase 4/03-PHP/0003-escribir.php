<?php
// Abro un archivo, y si no existe lo creo
$miarchivo = fopen("miarchivo.txt", "w");
// Indico algo de texto
$mitexto = "Este es un segundo texto que voy a escribir";
// Escribo el texto en el archivo
fwrite($miarchivo, $mitexto);
// Es importante cerrar los recursos una vez que ya no los usamos
fclose($miarchivo);
?>