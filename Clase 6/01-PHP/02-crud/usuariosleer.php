<style>
    table{border:1px solid grey;font-family:sans-serif;border-collapse: collapse;}
    
    table tr td,table tr th{margin:0px;padding:5px;border-spacing: 0px;}
    table tr:nth-child(odd){background:rgb(220,220,220);}
    table tr:nth-child(1){background:black;color:white;}
</style>
<table>
    <tr>
        <th>Identificador</th>
        <th>usuario</th>
        <th>contraseña</th>
        <th>nombrecompleto</th>
        <th>modificar</th>
        <th>borrar</th>
    </tr>
<?php
    // Primero me conecto a la base de datos
    $mysqli = mysqli_connect("localhost", "appusuario", "appcontrasena", "aplicacion");
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    $query = "SELECT * FROM usuarios";
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    $result = mysqli_query($mysqli, $query);
    // Ahora quiero obtener los usuarios en pantalla en forma de tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td>'.$row['Identificador'].'</td>
                <td>'.$row['usuario'].'</td>
                <td>'.$row['contrasena'].'</td>
                <td>'.$row['nombrecompleto'].'</td>
                <td><button>Modificar</button></td>
                <td><a href="usuariosborrar.php?id='.$row['Identificador'].'"><button>Eliminar</button></a></td>
            </tr>
        ';
    }

?>
</table>