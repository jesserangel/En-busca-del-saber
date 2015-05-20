<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");
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
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
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
				<center>
					<img src="../img/personaje_logo.png" />
					<div class="arrow_box" >
						<h2>Te aconsejo que practiques todos los d&iacute;as los ejercicios de matem&aacute;ticas que veas en clases, para que as&iacute; seas un(a) excelente estudiante.</h2>
					</div>
					<img style="width:400px; height:300px;" src="../img/enemy1_tv_cabeza.png" />
					<div class="arrow_box" >
						<h2>Te aconsejo que cumplas con las actividades o las tareas que te asigne tu maestro(a).</h2>
					</div>
					<img style="width:300px; height:300px;" src="../img/enemy2_mp3.png" />
					<div class="arrow_box" >
						<h2>Te aconsejo que prestes la debida atenci&oacute;n tanto a las clases de matem&aacute;ticas como a las dem&aacute;s, para que puedas adquirir el conocimiento que necesitas.</h2>
					</div>
					<img style="width:400px; height:300px;" src="../img/enemy3_carrito.png" />
					<div class="arrow_box" >
						<h2>Te aconsejo que no veas tanta televisi&oacute;n sino que dediques parte de tu tiempo a hacer las tareas, y hacer deportes para que crezcas sano(a) y fuerte.</h2>
					</div>
				</center>
			</article>
			<aside>

			</aside>
		</section>	
		<footer>
			<p>JRangell Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>