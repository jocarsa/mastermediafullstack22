<?php include "inc/cabecera.php" ?>

<?php
    
    $peticion = "
        INSERT INTO
        usuarios VALUES(
            NULL,
            '".$_POST['usuario']."',
            '".md5($_POST['contrasena'])."',
            '".$_POST['nombre']."'
        )
        ";
        mysqli_query($enlace,$peticion);
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['contrasena'] = md5($_POST['contrasena']);
    $_SESSION['nombre'] = $_POST['nombre'];
    echo '
        <meta http-equiv="Refresh" content="0; url=intranet.php" />
    ';
    
?>

<?php include "inc/piedepagina.php" ?>