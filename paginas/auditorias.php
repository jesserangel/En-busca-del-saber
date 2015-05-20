<?php

//requiere conexion.php
include("../funciones/conexion.php");

//requiere funciones.php
require_once("../funciones/funciones.php");

//verifica nombre y la contrasena del usuario
$sqlauditoria = "SELECT * FROM tbl_auditoria";

$rsauditoria = mysql_query($sqlauditoria, $conexion) or die(mysql_error());
       
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 (Beta)</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js" ></script>
	<script type="text/javascript" src="../p-in/selectivizr-min.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]>
  		<script type="text/javascript" src="selectivizr.js"></script>
  		<noscript><link rel="stylesheet" href="css/estilos.css" /></noscript>
	<![endif]-->
	<script type="text/javascript">
		var user = "" ;
		var pass = "" ;
		while ( user != "<?php echo $admin; ?>" || pass != "<?php echo $clave; ?>" )
		{
			user = prompt ("Introduzca su nombre de usuario: " , "" )
			pass = prompt ("Introduzca su clave: " , "" )
 		}
		alert ("Acceso concedido.");
	</script>
</head>
<body>
	<section id="cuerpoPrincipal">
		<header>
			<hgroup>
				<h1>Ver auditorias</h1>
			</hgroup>
		</header>
		<section>
			<article align="center" >
				<table class="centrador" border="1" cellspacing="30" cellpadding="5" bordercolor="#1d1d1d">
				<th>ID AUDITORIA</th>
				<th>NOMBRE DE USUARIO</th>
				<th>ACCION AUDITORIA</th>
				<th>TIEMPO AUDITORIA</th>
				<?php while($fila = mysql_fetch_array($rsauditoria)){ ?>
					<tr>
						<td><?php echo $fila["id_auditoria"]; ?></td>
						<td><?php echo $fila["nusua_usuario"]; ?></td>
						<td><?php echo $fila["accion_auditoria"]; ?></td>
						<td><?php echo $fila["tiemporeg_auditoria"]; ?></td>
					</tr>		
				<?php } ?>
				</table>
			</article>
			<aside style="max-width:65%; margin: 5em auto; text-align:center;">
				<p class="parrafosStyle3"><a href="../administracion.php">Volver al inicio!</a></p>
			</aside>
		</section>
		<footer>
			<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>