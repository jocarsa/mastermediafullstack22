<?php
// Me conecto con la base de datos
$db = new SQLite3('curso.sqlite3');
// Preparo una peticion
$query = "INSERT INTO alumnos VALUES(NULL,'Jorge','Granados','5423532','5345')";
// Ejecuto la petición contra el servidor
$db->exec($query);
