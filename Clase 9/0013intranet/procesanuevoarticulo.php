<?php include "inc/cabecera.php" ?>

<?php
    
    $peticion = "
        INSERT INTO
        articulos VALUES(
            NULL,
            '".$_SESSION['usuario']."',
            '".$_POST['titulo']."',
            '".$_POST['texto']."',
            '".date('U')."'
        )
        ";
        mysqli_query($enlace,$peticion);
//echo $peticion;
    echo '
        <meta http-equiv="Refresh" content="0; url=intranet.php" />
    ';
    
    ?>

<?php include "inc/piedepagina.php" ?>