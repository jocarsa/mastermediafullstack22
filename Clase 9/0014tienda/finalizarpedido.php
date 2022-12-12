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
echo '



';
?>
<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AS91q912AUILXTkQsuWg0__uq9LZxg1bPEBbikOgVxApH9CV6JQK_Z7med7UZFgKngxP0WC22L6DaZqv&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"Compra en mi comercio","amount":{"currency_code":"EUR","value":<?php echo $_SESSION['total'] ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
<?php include "inc/piedepagina.php" ?>