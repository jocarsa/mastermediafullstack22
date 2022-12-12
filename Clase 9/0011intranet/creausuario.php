<?php include "inc/cabecera.php" ?>

<section id="nuevousuario">
    <form action="procesanuevousuario.php" method="POST">
        <h4>Introduce tu nuevo nombre de usuario</h4>
        <input type="text" name="usuario">
        <h4>Introduce tu nueva contraseña</h4>
        <input type="password" name="contrasena">
        <h4>Introduce tu nombre completo</h4>
        <input type="text" name="nombre">
        <input type="submit" value="crear nuevo">
    </form>
</section>

<?php include "inc/piedepagina.php" ?>