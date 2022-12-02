<?php
function codifica($cadena){
    return base64_encode(base64_encode($cadena));
}
function descodifica($cadena){
    return base64_decode(base64_decode($cadena));
}
session_start(); 
$con = mysqli_connect("localhost","josevicente","josevicente","lms");
?>
<!doctype html>
<html lang="es">
	<head>
		<title>LMS</title>
		<meta charset="utf-8">
		<style>
			*{padding:0px;margin:0px;font-family:sans-serif;font-weight:normal;color:inherit;text-decoration:none;}
			body,html{width:100%;height:100%;background:rgb(240,240,240);}
			html{background:url(img/fondo.jpg);background-size:cover;}
			body{background:rgba(255,255,255,0.9);}
			#login{width:200px;position:relative;right:0px;float:right;background:white;height:100%;display:flex;align-items : center;flex-direction:column;padding:20px;text-align:center;box-shadow:0px 0px 10px black;}
			#login input{vertical-align:middle;width:100%;margin-top:10px;margin-bottom:10px;padding-top:5px;padding-bottom:5px;border:none;border-bottom:1px solid grey;background:none;border-radius:5px;outline:none;}
			#login input[type=submit]{border:1px solid grey;}
			.curso{float:left;width:200px;height:150px;background:white;padding:10px;border-radius:5px;box-shadow:0px 5px 10px rgba(0,0,0,0.3);margin:10px;text-align:center;}
			.curso .icono{width:100px;height:100px;font-size:100px;line-height:100px;text-align:center;background:grey;margin:auto;border-radius:5px;}
			header{height:40px;width:100%;background:rgb(50,50,100);color:white;padding:10px;}
			.usuario{float:right;width:200px;text-align:right;} 
			h1{width:600px;float:left;}
			aside{background:white;float:left;width:20%;height:100%;box-shadow:0px 0px 10px black;}
			main{float:right;width:80%;height:100%;}
			#recursos h3,#actividades  h3{background:rgb(50,50,100);color:white;padding:10px;margin-top:10px;margin:10px;}	
			aside ul li{padding:10px;}
			.recurso{margin:10px;padding:10px;background:white;border-radius:5px;}
			.recurso h4{font-size:20px;margin-bottom:10px;}
			.recurso p{margin-top:20px;margin-bottom:20px;}
			.recurso a{background:rgb(50,50,100);padding:10px;border-radius:5px;color:white;margin-top:20px;}
		</style>
	</head>
	<body>
	<?php
			if(isset($_POST['usuario'])){
				$result = mysqli_query($con, "SELECT * FROM lmsusuarios WHERE usuario = '".$_POST['usuario']."' AND contrasena = '".$_POST['contrasena']."'");
				while ($row = mysqli_fetch_assoc($result)) {$_SESSION['usuario'] = $row['usuario'];$_SESSION['contrasena'] = $row['contrasena'];$_SESSION['nombre'] = $row['nombre'];$_SESSION['idusuario'] = $row['Identificador'];}
				sleep(1);
				header('Location: ?');
			}
		?>
		<?php 
		if(!isset($_SESSION['usuario'])){ 
		$_SESSION['logo'] = $_SERVER['HTTP_HOST'];
		echo '
			<form action="?" method="POST" id="login"><img src="img/logo/'.$_SESSION['logo'].'.jpg"><input type="text" name="usuario" placeholder="usuario"><input type="password" name="contrasena" placeholder="contraseña"><input type="submit" value="Iniciar sesión"></form>
		';
		}else if(!isset($_GET['curso'])){
			echo '<header><a href="?"><h1>LMS</h1></a><div class="usuario">Hola, '.$_SESSION['nombre'].'</div></header>';
			$result = mysqli_query($con, "SELECT * FROM lmsmatriculas LEFT JOIN lmscursos ON lmsmatriculas.FK_lmscursos_nombre = lmscursos.Identificador WHERE lmsmatriculas.FK_lmsusuarios_usuario = '".$_SESSION['idusuario']."'");
			while ($row = mysqli_fetch_assoc($result)) {
				$color = 0;for($i = 0;$i<strlen($row['nombre']);$i++){$color += ord($row['nombre'][$i]);}$color = $color%255;
				echo '<a href="?curso='.codifica($row['Identificador']).'"><article class="curso"><div class="icono" style="background:hsl('.$color.',50%,50%);">'.$row['nombre'][0].'</div><h2>'.$row['nombre'].'</h2></article></a>';
			}
		} else if(isset($_GET['curso'])){
			$result = mysqli_query($con, "SELECT * FROM lmscursos WHERE Identificador = '".descodifica($_GET['curso'])."'");
			while ($row = mysqli_fetch_assoc($result)) {
			echo '<header><a href="?"><h1>LMS - '.$row['nombre'].'</h1></a><div class="usuario">Hola, '.$_SESSION['nombre'].'</div></header>';
			}
			echo '<aside>';
            $query = "SELECT * FROM lmstemas WHERE FK_lmscursos_nombre = '".descodifica($_GET['curso'])."' ORDER BY orden,Identificador";
			$result = mysqli_query($con,$query );
            echo $query;
			echo '<ul>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<a href="?curso='.codifica($_GET['curso']).'&tema='.codifica($row['Identificador']).'"><li>'.$row['titulo'].'</li></a>';
			}	
			echo '</ul>';
			echo '</aside>';
			echo '<main>';
			echo '<section id="recursos"><h3>Recursos</h3>';
			$result = mysqli_query($con, "SELECT * FROM lmsrecursos WHERE FK_lmstemas_titulo = '".descodifica($_GET['tema'])."'");
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div class="recurso"><h4>'.$row['titulo'].'</h4><p>'.$row['descripcion'].'</p><p><a href="'.codifica($row['enlace']).'">Pulsa para acceder</a></p></div>';
			}
			echo '</section>';
			echo '<section id="actividades"><h3>Actividades</h3>';
			$result = mysqli_query($con, "SELECT * FROM lmsactividades WHERE FK_lmstemas_titulo = '".descodifica($_GET['tema'])."'");
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div class="actividad">Actividad</div>';
			}
			echo '</section>';
			echo '</main>';
		}
		?>
		<?php
            /*
            Yo se que todo lo que pasa de una pagina a otra de PHP, está contenido
            -O bien en la URL, como variables GET
            -O bien de un formulario a otro, como POST
            -O bien lo he guardado en variables de sesión
            */
            // Creo una cadena inicial
            $misdatos = "";
            // Recorro todo lo que viene por GET y lo encadeno
            foreach($_GET as $clave=>$valor){$misdatos .= "".$clave.":".$valor."|";}
            // Recorro todo lo que viene por POST y lo encadeno
            foreach($_POST as $clave=>$valor){$misdatos .= "".$clave.":".$valor."|";}
            // Recorro todas las variables de sesion, y las encadeno
            foreach($_SESSION as $clave=>$valor){$misdatos .= "".$clave.":".$valor."|";}
            // Meto toda la información que pueda del usuario en la base de datos
            mysqli_query($con, "
            INSERT INTO logs 
            VALUES (
            NULL,
            '".date('U')."',
            '".$_SERVER['REMOTE_ADDR']."',
            '".$_SERVER['HTTP_USER_AGENT']."',
            '".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."',
            '".$misdatos."'
            )
            ");
        ?>
        
        
	</body>
</html>