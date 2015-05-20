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
		<a class="tooltip">
			<img style="margin-left:2em; margin-top: 53%; position:fixed; z-index:1;"src="../img/personaje_logo.png" />
   			<span>
        		<strong>¡Hola!</strong><br />
        		Aqui podras ver quien creo el videojuego.
   			</span>
		</a>
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
				<fieldset>
					<center>
						<h1 style="color:#fff;">En busca del saber v1.0</h1>
						<h3 style="font-size:3em; margin-top:1em; color:#fff;">Autor: Jesse Rangel</h3>
						<h3 style="font-size:2.5em; margin-top:1em; color:#fff;">Contacto: <a style="color:#fff;" href="http://www.jrangelsite.com/">jrangelsite.com</a></h3>
					</center>
				</fieldset>
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