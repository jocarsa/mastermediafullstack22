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
        header('Location: ?tabla='.$_POST['tabla']);
    }
// Vamos a ver si estamos insertando
    if(isset($_GET['operacion']) && $_GET['operacion'] == 'procesainsertar'){
        
        $peticion = "INSERT INTO ".$_POST['tabla']." VALUES (NULL,";
        $contador = 0;
        foreach($_POST as $campo=>$valor){
            if($contador > 2){
                $peticion .= "'".$valor."',";
            }
            $contador++;
        }
        $peticion = substr($peticion, 0, -1);
        $peticion .= ")";
        echo $peticion;
        // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = $peticion;
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    mysqli_query($mysqli, $query);
        header('Location: ?tabla='.$_POST['tabla']);
    }
// Vamos a ver si estamos actualizando
    if(isset($_GET['operacion']) && $_GET['operacion'] == 'procesamodificar'){
        foreach($_POST as $clave=>$valor){
            // Primero me conecto a la base de datos
            $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
            // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
            mysqli_set_charset($mysqli, "utf8mb4");
            // Quiero una lista de todos los usuarios
            $query = "
            UPDATE 
            ".$_POST['tabla']." 
            SET ".$clave." = '".$valor."'
            WHERE
            Identificador = ".$_POST['Identificador']."
            ";
            echo $query;
            // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
            mysqli_query($mysqli, $query);
        }
        header('Location: ?tabla='.$_POST['tabla']);
    }
?>

<style>
    *{padding:0px;margin:0px;color:inherit;text-decoration:none;font-family:sans-serif;}
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;width:95%;margin:16px;}
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
    nav{width:10%;float:left;height:100%;background:rgb(240,240,240);}
    main{width:90%;float:right;height:100%;background:rgb(250,250,250);}
    header{width:100%;height:40px;background:red;color:white;padding:5px;}
    nav ul li{padding:10px;border-bottom:1px solid grey;}
    button{padding:5px;width:100%;border:0px;border-radius:8px;box-shadow:0px 2px 4px rgba(0,0,0,0.3);}
    .botonmodificar{background:rgb(255,255,0);}
    .botonborrar{background:rgb(255,100,100);}
    .botoninsertar{background:rgb(100,255,100);width:200px;margin:10px;}
    form{padding:20px;column-count: 2;}
    form input{width:100%;padding-top:5px;padding-bottom:5px;margin-top:20px;}
    .grafica{width:400px;float:left;border-radius:5px;box-shadow:0px 4px 8px rgba(0,0,0,0.3);margin:10px;}
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
    <?php
        if(!isset($_GET['operacion'])){
            if(isset($_GET['tabla'])){
    ?>
            <a href="?operacion=insertar&tabla=<?php echo $_GET['tabla']?>"><button class="botoninsertar">Insertar</button></a>
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
                            <td><a href="?operacion=modificar&id='.$row['Identificador'].'&tabla='.$_GET['tabla'].'"><button class="botonmodificar">Modificar</button></a></td>
                            <td><a href="?id='.$row['Identificador'].'&tabla='.$_GET['tabla'].'&operacion=borrar"><button class="botonborrar">Eliminar</button></a></td>
                        </tr>
                    ';
                }

                ?>


                </table>
        <?php }else{
                ?>
    
                <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"hola":23,"adios":54,"que tal":32}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
    <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"hola":23,"adios":54,"que tal":32}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
    <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"hola":23,"adios":54,"que tal":32}' class="grafica">
        <img src='0003-phpgdgraficatartafuncion.php?micadena={"uno":1,"dos":2,"tres":3}' class="grafica">
    <?php
            }} ?>
        <?php 
            if(isset($_GET['operacion']) && $_GET['operacion'] == 'insertar'){
        ?>
                <form action="?operacion=procesainsertar" method="POST">
                    <input type="hidden" name="operacion" value="insertar">
                    <input type="hidden" name="tabla" value="<?php echo $_GET['tabla']?>">
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
                        echo '<input type="text" name="'.$row['Field'].'" placeholder="Indica tu '.$row['Field'].'">';
                        //var_dump($row);
                    }
                    ?>
                    <input type="submit">
                </form>
        <?php
            }
        ?>
    
    <?php 
            if(isset($_GET['operacion']) && $_GET['operacion'] == 'modificar'){
        ?>
               <form action="?operacion=procesamodificar" method="POST">
                    <input type="hidden" name="operacion" value="insertar">
                    <input type="hidden" name="tabla" value="<?php echo $_GET['tabla']?>">
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
                        // Creo un campo de tipo input
                        echo '<input type="text" name="'.$row['Field'].'" placeholder="Indica tu '.$row['Field'].'" value="';
                        // Preparo una segunda peticion en la cual quiero ver que es lo que tiene ese campo
                            $query2 = "
                            SELECT 
                            ".$row['Field']." 
                            FROM 
                            ".$_GET['tabla']."
                            WHERE Identificador = ".$_GET['id']."
                            ;";
                        // Preparo la peticion
                            $result2 = mysqli_query($mysqli, $query2);
                        // Devuelvo el resultado
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                               echo $row2[$row['Field']];
                            }
                        echo '">';
                        //var_dump($row);
                    }
                    ?>
                    <input type="submit">
                </form>
        <?php
            }
        ?>
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