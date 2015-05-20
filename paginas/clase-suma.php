<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

// graba registro de auditoria al ver clase de suma
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha ingresado en la clase de Suma')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Ingreso a la clase de Suma".mysql_error());
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 - Clase de suma</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js" ></script>
</head>
<body>
	<section id="cuerpoPrincipal">
		<a class="tooltip">
			<img style="margin-left:2em; margin-top: 53%; position:fixed; z-index:1;"src="../img/personaje_logo.png" />
   			<span>
        		<strong>¡Hey!</strong><br />
        		felicidades por superar el primer nivel.
   			</span>
		</a>
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
				<h3>Aprendiendo a sumar</h3>
			</hgroup>
			<section id="barraMenu">
				<nav>
					<ul>
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="instrucciones.php">Instrucciones</a></li>
						<li><a href="consejos.php">Consejos</a></li>
						<li><a href="acerca.php">Acerca</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul>
				</nav>
			</section>
		</header>
		<section>
			<article>

				<h3 class="h3Style">¿Qué es la adici&oacute;n?</h3>
				<br />
				<p class="parrafosStyle2"><u><i>La adici&oacute;n</i></u> que la que conocemos con el nombre de <u><i>suma</i></u> es una de las cuatro operaciones matem&aacute;ticas m&aacute;s importantes que necesitamos aprender para aumentar nuestro nivel de conocimiento y se representa con el s&iacute;mbolo de "+".</p><br />
				<p class="parrafosStyle2">La suma consiste en combinar dos n&uacute;meros para obtener un resultado final, para entenderlo te muestro el siguiente ejemplo:</p>
				<br/><br /><br /><br />
				<center>
					<p class="parrafosStyle2">Si tengo una manzana.....</p><br /><br />
					<img src="../img/manzana.png" title="Hola! soy una manzana!"><br /><br />
					<p class="parrafosStyle2">Y mi mam&aacute; me da otra...</p><br /><br />
					<img src="../img/manzana.png" title="Hola! soy una manzana!"><br /><br />
					<p class="parrafosStyle2">¿Ahora cu&aacute;ntas manzanas tengo? muy bien dos manzanas.</p><br /><br />
					<img src="../img/manzana.png" title="Hola! soy una manzana!">
					<span style="font-size: 10em;">+</span>
					<img src="../img/manzana.png" title="Hola! soy una manzana!"><br /><br /><br />
				</center>
				<p class="parrafosStyle2">Viendo este ejemplo sencillo, hemos comprendido ahora como es la suma. A continuaci&oacute;n te muestro un ejemplo con n&uacute;meros:</p><br />
				<center>
					<span style="font-size: 10em;">2 + 2 = 4</span><br /><br /><br />
					<p class="parrafosStyle2">B&aacute;sicamente tengo un n&uacute;mero dos, si le asigno otro dos obtengo como resultado cuatro! Felicidades.</p><br /><br />
				</center>
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