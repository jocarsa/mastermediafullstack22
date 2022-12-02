<?php
// Me conecto con la base de datos
$db = new SQLite3('../db/chat.sqlite');
// Preparo una peticion
$query = "
    SELECT * FROM mensajes
";

// Ejecuto la petición contra el servidor
$resultados = $db->query($query);
while ($fila = $resultados->fetchArray()) {
    echo '<article class="yo">'.$fila['mensaje'].'</article>';
}

?>

