<?php
    $archivo = basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], "archivos/".$archivo);
?>
<form action="?" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto">
    <input type="submit">
</form>