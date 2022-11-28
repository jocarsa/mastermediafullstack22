<style>
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;width:100%;}
    
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
</style>
<nav>
    <ul>
        <li><a href="?tabla=usuarios">Usuarios</a></li>
        <li><a href="?tabla=articulos">Articulos</a></li>
        <li><a href="?tabla=proyectos">Proyectos</a></li>
    </ul>
</nav>
<a href="usuariosinsertar.php"><button>Insertar</button></a>
<table>
    <tr>
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