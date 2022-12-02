<?php
// Me conecto con la base de datos
$db = new SQLite3('../db/chat.sqlite');
// Preparo una peticion
$query = "
    INSERT INTO 
    mensajes 
    VALUES(
        NULL,
        '',
        '".$_SERVER['REMOTE_ADDR']."',
        '".$_GET['mensaje']."',
        '".date('U')."'
    )";
// Ejecuto la petición contra el servidor
$db->exec($query);
?>