<?php
 // Vamos a ver si estamos borrando
    if(isset($_GET['operacion']) && $_GET['operacion'] == 'borrar'){
        //echo "alguien ha pedido borrar algo";
        //echo "Voy a borrar el usuario: ".$_GET['id'];
        // Primero me conecto a la base de datos
        $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
        // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
        mysqli_set_charset($mysqli, "utf8mb4");
        // Quiero eliminar un usuario concreto
        $query = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id']."";
        //echo $query;
        // Ejecuto la petición contra la base de datos
        mysqli_query($mysqli, $query);
    }
?>

<style>
    *{padding:0px;margin:0px;color:inherit;text-decoration:none;font-family:sans-serif;}
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;width:95%;margin:16px;}
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
    nav{width:10%;float:left;height:100%;background:rgb(240,240,240);}
    main{width:90%;float:right;height:100%;}
    header{width:100%;height:40px;background:red;color:white;padding:5px;}
    nav ul li{padding:10px;border-bottom:1px solid grey;}
    button{padding:5px;width:100%;border:0px;border-radius:8px;box-shadow:0px 2px 4px rgba(0,0,0,0.3);}
    .botonmodificar{background:rgb(255,255,0);}
    .botonborrar{background:rgb(255,100,100);}
    .botoninsertar{background:rgb(100,255,100);width:200px;margin:10px;}
</style>
<header><h1>SuperCrud</h1></header>
<nav>
    <ul>
        <!-- ///////////////////// PRIMERO SELECCIONAMOS LAS TABLAS ////////////////////// -->
        <?php
        // Primero me conecto a la base de datos
        $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
        // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
        mysqli_set_charset($mysqli, "utf8mb4");
        // Quiero una lista de todos los usuarios
        $query = "SHOW TABLES FROM aplicacion;";
        // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
        $result = mysqli_query($mysqli, $query);
        // Ahora quiero obtener los usuarios en pantalla en forma de tabla
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li><a href="?tabla='.$row["Tables_in_aplicacion"].'">'.$row["Tables_in_aplicacion"].'</a></li>';
            //var_dump($row);
        }
        ?>
    </ul>
</nav>
<main>
<a href="usuariosinsertar.php"><button class="botoninsertar">Insertar</button></a>
<table>
    <tr>
        <!-- ///////////////////// AHORA SELECCIONAMOS LAS COLUMNAS DE ESA TABLA ////////////////////// -->
        <?php
        // Primero me conecto a la base de datos
        $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
        // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
        mysqli_set_charset($mysqli, "utf8mb4");
        // Quiero una lista de todos los usuarios
        $query = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
        // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
        $result = mysqli_query($mysqli, $query);
        // Ahora quiero obtener los usuarios en pantalla en forma de tabla
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<th>'.$row['Field'].'</th>';
            //var_dump($row);
        }
        ?>
    </tr>
    <!-- ///////////////////// AHORA PONEMOS EL CONTENIDO DE LA TABLA ////////////////////// -->
    <?php
    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = "SELECT * FROM ".$_GET['tabla']."";
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    $result = mysqli_query($mysqli, $query);
    // Ahora quiero obtener los usuarios en pantalla en forma de tabla
    while ($row = mysqli_fetch_assoc($result)) {
        // Como sé seguro que tengo que abrir la fila, pues la abro
        echo '<tr>';
        // PARA CADA uno de los elementos en la matriz
        //var_dump($row);
        foreach($row as $columna=>$valor){
            // Creo una nueva columna, y le pongo el valor que le toca
            echo '<td>'.$valor.'</td>';
        }
        // La fila acaba sí o sí con los botones de modificar y eliminar
        echo '
                <td><a href="usuariosmodificar.php?id='.$row['Identificador'].'"><button class="botonmodificar">Modificar</button></a></td>
                <td><a href="?id='.$row['Identificador'].'&tabla='.$_GET['tabla'].'&operacion=borrar"><button class="botonborrar">Eliminar</button></a></td>
            </tr>
        ';
    }

    ?>
    
    
    </table>
</main>
    
    
    
    
    
    
    
    
    
    
    <script>
        function confirmar(){
            if (confirm("¿Estás segur@ de que quieres eliminar este registro?")) {
                //window.location = 
              } else {
                window.location = window.location
              }
        }
    </script>