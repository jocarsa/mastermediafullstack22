<style>
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;width:100%;}
    
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
</style>
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
<a href="usuariosinsertar.php"><button>Insertar</button></a>
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
                <td><a href="usuariosmodificar.php?id='.$row['Identificador'].'"><button>Modificar</button></a></td>
                <td><a href="usuariosborrar.php?id='.$row['Identificador'].'"><button>Eliminar</button></a></td>
            </tr>
        ';
    }

    ?>
    