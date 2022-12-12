<?php include "inc/cabecera.php" ?>
<section id="datosdecliente">
    <form action="finalizarpedido.php" method="POST">
        <h4>Introduce tu usuario</h4>
        <input type="text" name="usuario" required>
        <h4>Introduce tu contraseña</h4>
        <input type="password" name="contrasena" required>
        <h4>Introduce tu nombre</h4>
        <input type="text" name="nombre" required>
        <h4>Introduce tus apellidos</h4>
        <input type="text" name="apellidos" required>
        <h4>Introduce tu email</h4>
        <input type="text" name="email" required>
        <h4>Introduce tu telefono</h4>
        <input type="text" name="telefono" required>
        <h4>Introduce tu direccion</h4>
        <input type="text" name="direccion">
        <h4>Introduce tu localidad</h4>
        <input type="text" name="localidad">
        <h4>Introduce tu código postal</h4>
        <input type="text" name="cp">
        <h4>Introduce tu país</h4>
        <input type="text" name="pais">
        <h4>Introduce tu documento de id</h4>
        <input type="text" name="docid">
        <input type="submit">
    </form>

</section>
<?php include "inc/piedepagina.php" ?>