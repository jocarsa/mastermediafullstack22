<?php
// Me conecto con la base de datos
$db = new SQLite3('curso.sqlite3');
// Preparo una peticion
$query = "UPDATE alumnos SET telefono = 'abcde' WHERE nombre = 'Jorge'";
// Ejecuto la petición contra el servidor
$db->exec($query);
