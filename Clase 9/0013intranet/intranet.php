<?php include "inc/cabecera.php" ?>
<?php
    if(!isset($_SESSION['usuario'])){
        die("Intento de acceso no permitido, registrando en el sistema");
    }
    ?>

<!-- Formulario para crear un nuevo articulo -->
<form action="procesanuevoarticulo.php" method="POST">
    <h4>Introduce el título de tu artículo</h4>
    <input type="text" name="titulo">
    <h4>Introduce el texto</h4>
    <textarea name="texto"></textarea>
    <input type="submit">
</form>
<!-- Listado de tus articulos -->
<?php
    $peticion = "
        SELECT * FROM
        articulos WHERE FK_usuarios_nombrecompleto = '".$_SESSION['usuario']."'
        ";
        $resultado = mysqli_query($enlace,$peticion);
        while($fila = $resultado->fetch_assoc()){
            echo '
                <article>
                    <h3>'.$fila['titulo'].'</h3>
                    <p>'.$fila['contenido'].'</p>
                    <p>'.date("Y-m-d H:i:s", substr($fila['fecha'], 0, 10)).'</p>

                </article>
            ';
            
        }
?>

<?php include "inc/piedepagina.php" ?>