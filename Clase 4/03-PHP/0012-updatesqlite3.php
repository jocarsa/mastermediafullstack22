<?php
// Me conecto con la base de datos
$db = new SQLite3('curso.sqlite3');
// Preparo una peticion
$query = "
UPDATE alumnos 
SET telefono = '234523523523534523' 
WHERE 
Identificador = 2
";
// Ejecuto la petición contra el servidor
$db->exec($query);
