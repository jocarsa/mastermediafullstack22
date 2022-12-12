<?php include "inc/cabecera.php" ?>
<?php
    $idcliente = "";
    $idpedido = "";
    // Primero metemos al usuario en la base de datos
    $peticion = "
        INSERT INTO
        clientes VALUES(
            NULL,
            '".$_POST['usuario']."',
            '".$_POST['contrasena']."',
            '".$_POST['nombre']."',
            '".$_POST['apellidos']."',
            '".$_POST['email']."',
            '".$_POST['telefono']."',
            '".$_POST['direccion']."',
            '".$_POST['cp']."',
            '".$_POST['localidad']."',
            '".$_POST['pais']."',
            '".$_POST['docid']."'
        )
        ";
        mysqli_query($enlace,$peticion);
//echo $peticion."<br><br>";
    // Ahora quiero saber cual es el id del ultimo usuario metido en la base de datos
    $peticion = "
        SELECT * FROM
        clientes 
        ORDER BY Identificador DESC
        LIMIT 1
        "; // Me quedo con el ultimo cliente
    $resultado = mysqli_query($enlace,$peticion);
    while($fila = $resultado->fetch_assoc()){
        // El resultado lo meto en una variable llamada idcliente que voy a usar más adelante
        $idcliente = $fila['Identificador'];
    }
//echo $peticion."<br><br>";
 // Y ahora meto un nuevo pedido en la tabla de pedidos
$peticion = "
        INSERT INTO
        pedidos VALUES(
            NULL,
            '".$idcliente."',
            '".date('U')."'
        )
        ";
        mysqli_query($enlace,$peticion);
//echo $peticion."<br><br>";
    // Ahora quiero recuperar el id de pedido
$peticion = "
        SELECT * FROM
        pedidos 
        ORDER BY Identificador DESC
        LIMIT 1
        "; // Me quedo con el id del ultimo pedido
    $resultado = mysqli_query($enlace,$peticion);
    while($fila = $resultado->fetch_assoc()){
        // Y lo meto en una variable idpedido
        $idpedido = $fila['Identificador'];
    }
//echo $peticion."<br><br>";
    // Repaso la variable de sesion de lineas de pedido, y meto uno a uno en la base de datos
    foreach($_SESSION['carrito'] as $producto){
            $peticion = "
                INSERT INTO 
                lineapedido
                VALUES(
                NULL,
                '".$idpedido."',
                '".$producto->id."',
                '".$producto->cantidad."'
                )
            ";
            mysqli_query($enlace,$peticion);
            
        }
//echo $peticion."<br><br>";
// Voy a vaciar el pedido para hacer uno nuevo
    $_SESSION['carrito'] = [];
echo "Y ya esta<br>";
?>
<?php include "inc/piedepagina.php" ?>