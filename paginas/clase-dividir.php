<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

// graba registro de auditoria al ver clase de division
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha ingresado en la clase de Division')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Ingreso a la clase de Division".mysql_error());
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
        		<strong>¡Impresionante!</strong><br />
        		Has superado el ultimo nivel, te felicito.
   			</span>
		</a>
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
				<h3>Aprendiendo a dividir</h3>
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

				<h3 class="h3Style">¿Qué es la divisi&oacute;n?</h3>
				<br />
				<p class="parrafosStyle2">La <u><i>divisi&oacute;n</i></u> es la operaci&oacute;n matem&aacute;tica inversa o contraria a la multiplicaci&oacute;n, y consiste en determinar la cantidad de veces que esta contenido un n&uacute;mero en otro. Para poder entender &eacute;ste concepto vamos a ver un ejemplo:</p><br />
				<center>
					<span style="font-size: 10em;">10 : 2 = 5</span>
				</center>
				<br /><br /><p class="parrafosStyle2">Por medio de &eacute;ste ejemplo, podemos comprender que el n&uacute;mero cinco se esta repitiendo dos veces, y que la mitad del n&uacute;mero diez es cinco, veamos un nuevo ejemplo:</p><br /><br />
				<center>
					<span style="font-size: 10em;">36 : 4 = 9</span>
				</center>
				<br /><br /><p class="parrafosStyle2">Visto este ejemplo sencillo, podemos entender que hemos divido el n&uacute;mero 36 en cuatro partes, y el valor de cada parte es de 9. Para concluir te muestro el siguiente ejemplo gr&aacute;fico: </p><br /><br />
				<center>
					<p class="parrafosStyle2">Si tengo cuatro peras</p><br /><br />
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!">
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!">
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!">
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!"><br /><br /><br /><br />
					<p class="parrafosStyle2">Y quiero dividirlas en dos partes iguales, ¿Qu&eacute; resultado obtendr&iacute;a?</p><br /><br />
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!">
					<img class="imgSize" src="../img/pera.png" title="Hola! soy una pera!"><br /><br /><br /><br />
					<p class="parrafosStyle2">Muy bien obtendr&iacute;a dos pares de peras. Excelente!</p><br /><br />
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