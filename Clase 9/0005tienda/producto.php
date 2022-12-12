<?php include "inc/cabecera.php" ?>

<section id="producto">
    <?php
        $peticion = "
        SELECT * 
        FROM productos
        WHERE Identificador = ".$_GET['id']."
        ";
        $resultado = mysqli_query($enlace,$peticion);
        while($fila = $resultado->fetch_assoc()){
            echo '
                <article>
                    <h3>'.$fila['nombre'].'</h3>
                    <img src="photo/camisa.jpg" alt="producto">
                    <p>'.$fila['descripcion'].' €</p>
                    <p>'.$fila['precio'].' €</p>
                    <form action="anadiracarrito.php" method="POST">
                        <input type="hidden" name="producto" value="'.$fila['Identificador'].'">
                        <input type="number" name="unidades">
                        <input type="submit" value="Comprar">
                    </form>
                    
                </article>
            ';
            
        }
    ?>
    
</section>

<?php include "inc/piedepagina.php" ?>