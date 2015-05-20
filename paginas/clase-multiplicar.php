<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");


// graba registro de auditoria al ver clase de multiplicacion 
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha ingresado en la clase de Multiplicacion')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Ingreso a la clase de Multiplicacion".mysql_error());

?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 - Clase de suma</title>
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
        		Muy bien, has hecho un excelente trabajo!.
   			</span>
		</a>
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
				<h3>Aprendiendo a multiplicar</h3>
			</hgroup>
			<section id="barraMenu">
				<nav>
					<ul>
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="?pag=instrucciones">Instrucciones</a></li>
						<li><a href="?pag=consejos">Consejos</a></li>
						<li><a href="?pag=acerca">Acerca</a></li>
						<li><a href="salir.php">Salir</a></li>
					</ul>
				</nav>
			</section>
		</header>
		<section>
			<article>

				<h3 class="h3Style">¿Qué es la multiplicaci&oacute;n?</h3>
				<br />
				<p class="parrafosStyle2"><u><i>La multiplicaci&oacute;n</i></u> pertenece a las cuatros operaciones matem&aacute;ticas que estaremos aprendiendo.</p><br />
				<p class="parrafosStyle2">Si ya sabes sumar podr&aacute;s aprender &eacute;sta operaci&oacute;n r&aacute;pidamente, para que veas lo sencillo que es, te ense&ntilde;o un ejemplo:</p><br /><br />
				<br/>
				<center>
					<span style="font-size: 10em;">2 + 2 + 2 = 6</span>
				</center>
				<br /><br /><br /><br /><p class="parrafosStyle2">Viendo &eacute;ste ejemplo sencillo, podemos ver que la multiplicaci&oacute;n es sumar varias veces el mismo n&uacute;mero, en este caso estamos sumando el n&uacute;mero 2 tres veces. Pero al momento de multiplicar debemos hacerlo de esta manera que es a&uacute;n m&aacute;s f&aacute;cil, ve el siguiente ejemplo:</p><br /><br />
				<center>
					<span style="font-size: 10em;">2 x 3 = 6</span>
				</center>
				<br /><br /><br /><br /><p class="parrafosStyle2">Debemos tomar en cuenta que al momento de multiplicar dos o m&aacute;s n&uacute;meros, utilizamos el s&iacute;mbolo de multiplicaci&oacute;n representado por la: "X" o por el "." bastante sencillo ¿verdad? te muestro un &uacute;ltimo ejemplo, pero con dibujos.</p><br /><br /><br /><br />
				<center>
					<p class="parrafosStyle2">Si tengo un barco.</p>
					<img src="../img/barco.png" title="Hola! soy un barco!"><br /><br />	
					<p class="parrafosStyle2">Y lo multiplico por dos, ¿cu&aacute;ntos barcos tengo ahora?</p><br />
					<img src="../img/barco.png" title="Hola! soy un barco!">
					<img src="../img/barco.png" title="Hola! soy un barco!"><br /><br />
					<p class="parrafosStyle2">Muy bien ahora tengo dos barcos!</p><br />
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