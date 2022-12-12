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
        foreach($_SESSION['carrito'] as $producto){
            echo $producto->id;
            echo "<br>";
            echo $producto->cantidad;
            echo "<hr>";
        }
    ?>
</div>
    </body>
</html>