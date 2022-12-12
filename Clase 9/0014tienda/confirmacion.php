<?php include "inc/cabecera.php" ?>
<section id="confirmar">
<h4>Carrito</h4>
    <?php
    $total = 0;
        foreach($_SESSION['carrito'] as $producto){
            $peticion = "
                SELECT * 
                FROM productos
                WHERE Identificador = ".$producto->id."
            ";
            $resultado = mysqli_query($enlace,$peticion);
            while($fila = $resultado->fetch_assoc()){
                echo '
                    <article>
                        <h5>'.$fila['nombre'].'</h5>
                        <h6>
                            '.$producto->cantidad.' 
                            x 
                            '.$fila['precio'].': 
                            '.($producto->cantidad*$fila['precio']).' €
                            </h6>
                    </article>
                ';
                $total += $producto->cantidad*$fila['precio'];
                
            }
        }
    echo "<h6>Total: ".$total." €</h6>";
    echo "<a href='datosdecliente.php'><button>Confirmar y procesar</button></a>";
    ?>
</section>
<?php include "inc/piedepagina.php" ?>