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
						<h2>Hola! de nuevo amiguito(a) a continuaci&oacute;n te estare ense&ntilde;ando todo lo necesario para que puedas jugar y divertirte al m&aacute;ximo.</h2>
					</div>
					<img style="border-radius:1em; width:350px; height:250px;" src="../img/Arrow_keys.jpg" />
					<div class="arrow_box" >
						<h2>Para que me pueda mover a la derecha o a la izquierda, debes utilizar las teclas de direcci&oacute;n como las que ves en la imagen.</h2>
					</div>
					<img style="width:600px; height:150px;" src="../img/space_key_s.png" />
					<div class="arrow_box" >
						<h2>El salto va a ser la habilidad especial con que podr&aacute;s vencer a los elementos distractores, para hacerlo debes pulsar la tecla de espacio como la que ves en la imagen.</h2>
					</div>
					<img style="width:400px; height:300px;" src="../img/enemy1_tv_cabeza.png" />
					<div class="arrow_box" >
						<h2>El personaje como el que ves aqu&iacute;, es un elemento distractor y ellos ser&aacute;n tus enemigos durante cada nivel del juego, para que puedas vencerlos debes saltar sobre ellos sin que te toquen.</h2>
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