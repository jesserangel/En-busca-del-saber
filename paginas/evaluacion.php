<?php 

// limpia variables de las sesiones
if(isset($_SESSION['idejerc'])) session_unset($_SESSION['idejerc']);
if(isset($_SESSION['idrespcorr'])) session_unset($_SESSION['idrespcorr']);

//incluye funciones.php
require_once("../funciones/funciones.php");

//incluye validarsesion.php
require_once("../funciones/validarsesion.php");

// establecer la conexion
require_once("../funciones/conexion.php");

$sql_ejerc = "SELECT * FROM tbl_ejercicios WHERE (estatus_ejerc='ACTIVO') ORDER BY RAND() LIMIT 4";
$rs_ejerc = mysql_query($sql_ejerc,$conexion) or die("Error al Consultar los ejercicios... ".mysql_error());
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 - Evalaci&oacute;n</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js" ></script>
	<script type="text/javascript">
		// funcion validaForm()
		function validaForm() {
			// inicializa variable respuesta_seleccionada
			var respuesta_seleccionada = false;
			// verifica que un valor de rad_resp_ejerc1 fue seleccionado
			var radio_resp1 = document.getElementsByName("rad_resp_ejerc1");
			for(i=0; i<radio_resp1.length; i++)	{
				if(radio_resp1[i].checked) {
					respuesta_seleccionada = true;
				}	
			}
			// verifica que un valor de rad_resp_ejerc2 fue seleccionado
			var radio_resp2 = document.getElementsByName("rad_resp_ejerc2");
			for(i=0; i<radio_resp2.length; i++)	{
				if(radio_resp2[i].checked) {
					respuesta_seleccionada = true;
				}
			}
			// verifica que un valor de rad_resp_ejerc3 fue seleccionado
			var radio_resp3 = document.getElementsByName("rad_resp_ejerc3");
			for(i=0; i<radio_resp3.length; i++)	{
				if(radio_resp3[i].checked) {
					respuesta_seleccionada = true;
				}
			}
			// verifica que un valor de rad_resp_ejerc4 fue seleccionado
			var radio_resp4 = document.getElementsByName("rad_resp_ejerc4");
			for(i=0; i<radio_resp4.length; i++)	{
				if(radio_resp4[i].checked) {
					respuesta_seleccionada = true;
				}
			}
			// evalua si se selecciono al menos una respuesta
			if(respuesta_seleccionada) {
				document.getElementById("frm_evalejerc").submit();
				return true;
			} else {
				alert("Repite de nuevo la evaluacion, recuerda que debes seleccionar al menos una respuesta.");
				return false;
			}
		}
	</script>
</head>
<body>
	<section id="cuerpoPrincipal">
		<header>
			<hgroup>
				<h1>En Busca del Saber v1.0</h1>
				<h3>Evaluando tus conocimientos</h3>
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
						<h2>Hola! amiguito(a) es momento de evaluar tus conocimientos. Te estar&eacute; colocando cuatro operaciones matem&aacute;ticas, tu misi&oacute;n es responderlas todas correctamente. Debes seleccionar s&oacute;lo una de las respuestas por cada pregunta y recuerda que solamente una de ellas es correcta. Mucho &eacute;xito!!.</h2>
					</div>
				</center>
				<br /><br />
				<form name="frm_evalejerc" id="frm_evalejerc" action="resultado-evaluacion.php" method="post">
				<table class="centrador" border="1" cellspacing="30" cellpadding="5" bordercolor="#1d1d1d">
    			<tr>
        			<th>PREGUNTAS</th>
        			<th>RESPUESTAS</th>
        		</tr>
				<?php
					$ejerc=0;
					// muestra los ejercicios
    				while($fila_ejerc = mysql_fetch_array($rs_ejerc)){
					// incrementa el contador de ejercicios
					$ejerc++;
					// almacena el id del ejercicio
					$_SESSION['idejerc'][$ejerc] = $fila_ejerc['id_ejerc'];
					// almacena el id de la respuesta correcta
					$_SESSION['idrespcorr'][$ejerc] = $fila_ejerc['id_respcorr_ejerc'];
				?>
    			<tr>
        			<td >
						<?php echo utf8_encode($fila_ejerc['cont_ejerc']); ?>
            		</td>
        			<td>
						<?php 
						$sql_resp = "SELECT * FROM tbl_respuestas WHERE id_ejerc=".$fila_ejerc['id_ejerc']." ORDER BY id_resp ASC";
						$rs_resp = mysql_query($sql_resp, $conexion) or die(mysql_error());
						?>
			 			<table cellspacing="5" cellpadding="5" bordercolor="#1d1d1d">
            			<?php
							// muestra las respuestas posibles para el ejercicio actual
							while($fila_resp = mysql_fetch_array($rs_resp)){
						?>
                <tr>
                    <td>
                    	<input type="radio" name="rad_resp_ejerc<?php echo $ejerc; ?>" id="rad_resp_ejerc<?php echo $ejerc; ?>" value="<?php echo $fila_resp['id_resp']; ?>" />
                    	<?php echo utf8_encode($fila_resp['cont_resp']) ?>
                    </td>
                </tr>
            				<?php
							}
							?>
						</table>
            		</td>
        		</tr>
    			<?php
				}
				?>
    			</table>
    			<br />
    			<center>
    			<input class="btn" style="align= center;" type="submit" name="btn_evaluar" id="btn_evaluar" value="Ver resultados" onclick="validaForm();" />
    			</center>
    			<!-- campo oculto -->
    			<input type="hidden" name="ejerchidden" id="ejerchidden" value="1"/>
				</form>
			</article>
		</section>	
		<footer>
			<p>JRangell Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>