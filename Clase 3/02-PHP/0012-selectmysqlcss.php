<html>
    <head>
        <style>
            body{font-family: sans-serif;color:blue;}
        </style>
    </head>
    <body>
        <?php
        // Me conecto con la base de datos
        $mysqli = mysqli_connect("localhost", "mastermedia", "mastermedia", "curso");
        // Preparo una peticion
        $query = "SELECT * FROM alumnos";
        // Ejecuto la petición contra el servidor
        $result = mysqli_query($mysqli, $query);
        // Devuelvo los usuarios en pantalla
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['nombre']." - ".$row['apellidos']." - ".$row['telefono']." - ".$row['dninie'];
        }
        ?>
    </body>
</html>