<?php
// Me conecto con la base de datos
$db = new SQLite3('curso.sqlite3');
// Preparo una peticion
$query = "
    DELETE 
    FROM alumnos 
    WHERE 
    Identificador = 2
";
// Ejecuto la petición contra el servidor
$db->exec($query);
