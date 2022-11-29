<?php
    if(isset($_FILES["foto"])){
        var_dump($_FILES["foto"]);
        $archivo = basename($_FILES["foto"]["name"]);
        // Primero comprobamos si lo que estoy subiendo es un JPG
        if($_FILES["foto"]["type"] != "image/jpeg"){
            die("Lo que has subido no es una foto");
        }
        // Ahora compruebo si lo que estoy subiendo no excede una cantidad de memoria que yo digo
        if($_FILES["foto"]["size"] > 100000){
            die("El archivo excede los límites");
        }
        // Compruebo si el archivo existía antes
        if(file_exists($_FILES["foto"]["tmp_name"])){
            die("El archivo ya existia");
        }
        move_uploaded_file($_FILES["foto"]["tmp_name"], "archivos/".$archivo);
    }
?>
<form action="?" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto">
    <input type="submit">
</form>