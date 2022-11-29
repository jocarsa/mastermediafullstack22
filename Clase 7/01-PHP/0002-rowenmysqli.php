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
    while ($fila = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td>'.$fila['Identificador'].'</td>
                <td>'.$fila['usuario'].'</td>
                <td>'.$fila['contrasena'].'</td>
                <td>'.$fila['nombrecompleto'].'</td>
                <td><button>Modificar</button></td>
                <td><a href="usuarioseliminar.php?id='.$row['Identificador'].'"><button>Eliminar</button></a></td>
            </tr>
        ';
    }

?>