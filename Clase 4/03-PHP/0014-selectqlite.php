<?php
// Me conecto con la base de datos
$db = new SQLite3('curso.sqlite3');
// Preparo una peticion
$query = "
    SELECT * FROM alumnos
";

// Ejecuto la petición contra el servidor
$resultados = $db->query($query);
while ($fila = $resultados->fetchArray()) {
    echo $fila['nombre']."-".$fila['apellidos']."<br>";
}

?>