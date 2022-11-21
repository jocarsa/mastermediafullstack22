<?php
// Me conecto con la base de datos
$mysqli = mysqli_connect("localhost", "mastermedia", "mastermedia", "curso");
// Preparo una peticion
$query = "DELETE FROM alumnos WHERE nombre = 'Ana'";
// Ejecuto la petición contra el servidor
mysqli_query($mysqli, $query);
?>