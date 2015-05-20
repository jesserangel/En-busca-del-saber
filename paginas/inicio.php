<?php 
include("paginacion.php");

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

session_start();

?>
<!DOCTYPE html>
<html lang="es-VE">
<head>
	<title><?php echo $titulo; ?></title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js" ></script>
	<script src="../p-in/selectivizr-min.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]>
  		<script type="text/javascript" src="selectivizr.js"></script>
  		<noscript><link rel="stylesheet" href="../css/estilos.css" /></noscript>
	<![endif]-->
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
			<?php include($contenido); ?>
		</section>
		<footer>
			<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>