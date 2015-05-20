<?php
/* resultado-evaluacion-tema1.php */
// requiere archivos

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

// establecer la conexion
require_once("../funciones/conexion.php");

// recibe los campos del formulario frm_evaltema
// tema evaluado
if(isset($_POST['ejerchidden'])) { $ejerchidden = $_POST['ejerchidden']; } else { $ejerchidden = 0; }
// respuestas seleccionadas por el usuario
for($i=1; $i<=4; $i++) {
	if(isset($_POST['rad_resp_ejerc'.$i])) { $rad_resp_ejerc[$i] = $_POST['rad_resp_ejerc'.$i]; } else { $rad_resp_ejerc[$i] = 0; }
}
// graba registro de auditoria al Evalua 
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha presentado la evaluacion')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Evaluar".mysql_error());

// inicializa variables para la evaluacion del tema
$contRespCorr = 0;
$contRespIncorr = 0;
$puntuacionObtenida = 0;
// compara las respuestas correctas y las respuestas seleccionadas, para cada pregunta evaluada
for($i=1; $i<=4; $i++) {
	// id de la pregunta evaluada
	$idejerc[$i] = $_SESSION['idejerc'][$i];
	// id de la respuesta correcta a la pregunta
	$idrespcorr[$i] = $_SESSION['idrespcorr'][$i];
	// actualiza contadores de respuestas (Correctas e Incorrectas)
	// si el id de la respuesta seleccionada coincide con el id de la respuesta correcta
	if($rad_resp_ejerc[$i] === $idrespcorr[$i]){
		// incrementa contador de respuestas correctas
		$contRespCorr++;

	} else {
		// incrementa contador de respuestas incorrectas
		$contRespIncorr++;
	}
}
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 - Evalaci&oacute;n</title>
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
				<h3>Resultados obtenidos</h3>
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
				<?php 

				echo "<h3 style='color: black';>Respuestas correctas: " .$contRespCorr . "</h3>";
				echo "<h3 style='color: black';>Respuestas incorrectas: ".$contRespIncorr."</h3>";
				echo "<br /><br /><br /><br />";
				if(($contRespCorr <= 1)&&($contRespIncorr > 1))
					echo "<h3 style='color: red;'>Debe seguir practicando, &animo!</h3>";
				else if(($contRespCorr > 1)&&($contRespIncorr <= 1))
					echo "<h3 style='color: green;'>Muy bien, has contestado correctamente!</h3>";
				else if(($contRespCorr == 2)&&($contRespIncorr == 2))
					echo "<h3 style='color: black;'>No esta mal, puedes mejorarlo!</h3>";
				?>
					</div>
				</center>
			</article>
			<br />
			<aside>
				<div style="float:left;">
					<p class="parrafosStyle3" ><a href="evaluacion.php">Repetir evaluacion</a></p>
				</div>
				<div style="float:right;">
					<p class="parrafosStyle3" ><a href="inicio.php">Volver al inicio!</a></p>
				</div>
				<br /><br /><br />
			</aside>
		</section>	
		<footer>
			<p>JRangell Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>
















