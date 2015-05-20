<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

// graba registro de auditoria al ver clase de resta
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha ingresado en la clase de Resta')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Ingreso a la clase de Resta".mysql_error());
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 - Clase de resta</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js"></script>
</head>
<body>
	<section id="cuerpoPrincipal">
		<a class="tooltip">
			<img style="margin-left:2em; margin-top: 53%; position:fixed; z-index:1;"src="../img/personaje_logo.png" />
   			<span>
        		<strong>¡Wow!</strong><br />
        		felicidades por superar el segundo nivel.
   			</span>
		</a>
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
				<h3>Aprendiendo a restar</h3>
			</hgroup>
			<div id="barraMenu">
				<nav>
					<ul>
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="instrucciones.php">Instrucciones</a></li>
						<li><a href="consejos.php">Consejos</a></li>
						<li><a href="acerca.php">Acerca</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<section>
			<article>

				<h3 class="h3Style">¿Qu&eacute; es la sustracci&oacute;n?</h3>
				<br />
				<p class="parrafosStyle2"><u><i>La sustracci&oacute;n</i></u> que la que conocemos con el nombre de <u><i>resta</i></u> tambi&eacute;n es una de las cuatro operaciones matem&aacute;ticas m&aacute;s importantes que debemos de aprender para ser excelentes estudiantes. La resta al igual que la suma es una operaci&oacute;n muy sencilla, lee con atenci&oacute;n para que puedas entender:</p><br />
				<p class="parrafosStyle2">La resta es la operaci&oacute;n matem&aacute;tica que nos permite quitar o desminuir un valor, para que puedas entender te muestro el siguiente ejemplo:</p><br /><br />
				<br/>
				<center>
					<p class="parrafosStyle2">Si tengo dos carritos.....</p><br /><br />
					<img src="../img/carrito.png" title="Hola! soy un carrito!">
					<span style="font-size: 10em;"></span>
					<img src="../img/carrito.png" title="Hola! soy un carrito!"><br /><br />
					<p class="parrafosStyle2">Y quito uno...</p><br /><br />
					<img src="../img/carrito.png" title="Hola! soy un carrito!">
					<span style="font-size: 10em;">-</span>
					<img src="../img/carrito.png" title="Hola! soy un carrito!"><br /><br />
					<p class="parrafosStyle2">¿Ahora cu&aacute;ntos carritos tengo? muy bien s&oacute;lo tengo uno.</p><br /><br />
					<img src="../img/carrito.png" title="Hola! soy un carrito!"><br /><br />
				</center>
				<p class="parrafosStyle2">Con &eacute;ste ejemplo nos damos cuenta de lo sencillo que es restar, si te fijas bien el s&iacute;mbolo que se utiliza para restar es este: <b>"-"</b> , es una rayita que debemos colocar siempre cuando vamos a restar y lleva por nombre "menos". Ahora veamos un ejemplo con n&uacute;meros:</p><br />
				<center>
					<span style="font-size: 10em;">10 - 2 = 8</span><br /><br />
				</center>
					<p class="parrafosStyle2">Para poder restar correctamente necesitamos saber lo siguiente: </p><br /><br />
					<p class="parrafosStyle2">1) El primer valor debe ser mayor que el segundo como se ve en el ejemplo: 10 - 2.</p><br /><br />
					<p class="parrafosStyle2">2) A ese primer valor se le conoce con el nombre de "Minuendo".</p><br /><br />
					<p class="parrafosStyle2">3) Al segundo que es el m&aacute;s pequeño se le conoce con el nombre de "Sustraendo".</p><br /><br />
					<p class="parrafosStyle2">4) El resultado que obtengamos de la resta, lleva por nombre "Diferencia". </p><br /><br />
				
			</article>
			<aside>
				<div style="float:left;">
					<p class="parrafosStyle3" ><a href="evaluacion.php">Evaluar conocimientos</a></p>
				</div>
				<div style="float:right;">
					<p class="parrafosStyle3"><a href="inicio.php">Volver al inicio!</a></p>
				</div>
			</aside>
		</section>	
		<footer>
			<p>JRangell Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>