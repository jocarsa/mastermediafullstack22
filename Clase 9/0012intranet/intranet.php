<?php include "inc/cabecera.php" ?>
<?php
    if(!isset($_SESSION['usuario'])){
        die("Intento de acceso no permitido, registrando en el sistema");
    }
    ?>

Si estas viendo esto, es que te has colado en la intranet

<?php include "inc/piedepagina.php" ?>