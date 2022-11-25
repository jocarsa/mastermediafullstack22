<?php
// Me conecto con la base de datos
$mysqli = mysqli_connect("localhost", "mastermedia", "mastermedia", "curso");
// Preparo una peticion
$query = "INSERT INTO alumnos VALUES(NULL,'Jorge','Granados','5423532','5345')";
// Ejecuto la petición contra el servidor
mysqli_query($mysqli, $query);
