<?php include "inc/cabecera.php" ?>

<?php
    $peticion = "
        SELECT * FROM
        articulos 
        ";
        $resultado = mysqli_query($enlace,$peticion);
        while($fila = $resultado->fetch_assoc()){
            echo '
                <article>
                    <h3>'.$fila['titulo'].'</h3>
                     <h4>'.$fila['FK_usuarios_nombrecompleto'].'</h4>
                    <p>'.$fila['contenido'].'</p>
                    <p>'.date("Y-m-d H:i:s", substr($fila['fecha'], 0, 10)).'</p>

                </article>
            ';
            
        }
?>

<?php include "inc/piedepagina.php" ?>