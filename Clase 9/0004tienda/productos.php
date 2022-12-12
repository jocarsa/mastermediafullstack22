<?php include "inc/cabecera.php" ?>

<section id="productos">
    <?php
        $peticion = "SELECT * FROM productos";
        $resultado = mysqli_query($enlace,$peticion);
        while($fila = $resultado->fetch_assoc()){
            echo '
                <article>
                    <h3>'.$fila['nombre'].'</h3>
                    <img src="photo/camisa.jpg" alt="producto">
                    <p>'.$fila['precio'].' €</p>
                    <a href="producto.php?id='.$fila['Identificador'].'">
                        <button>
                            Más información
                        </button>
                    </a>
                </article>
            ';
            
        }
    ?>
    
</section>

<?php include "inc/piedepagina.php" ?>