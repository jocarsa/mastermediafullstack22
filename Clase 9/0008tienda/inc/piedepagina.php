<div class="clearfix"></div>            
</main>
        <footer>
            <p>(c) 2022 La Tienda de Camisas</p>
        </footer>
<div id="consola">
    <?php
        var_dump($_SESSION['carrito']);
    ?>
</div>
<div id="carrito">
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
    echo "<a href='confirmacion.php'><button>Confirmar</button></a>";
    ?>
</div>
    </body>
</html>