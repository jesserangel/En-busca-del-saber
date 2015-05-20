<?php

//requiere conexion.php
include("funciones/conexion.php");

//requiere funciones.php
require_once("funciones/funciones.php");

//verifica nombre y la contrasena del usuario
$sqladmin = "SELECT * FROM tbl_administrador";

$rsadmin = mysql_query($sqladmin, $conexion) or die(mysql_error());
       
if (mysql_num_rows($rsadmin) > 0) {
	$fila = mysql_fetch_array($rsadmin);

	$admin = $fila["nadm_admin"];
	$clave = $fila["clave_admin"];
} else {
	mysql_error();
}
?>
<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0 (Beta)</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/modernizr.js" ></script>
	<script type="text/javascript" src="p-in/selectivizr-min.js"></script>
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
				<h1>Panel de administracion</h1>
			</hgroup>
		</header>
		<section>
		<section>
			<?php echo "<center><h1 style='margin-top:1em; color:#000;'>Bienvenido(a): " . $admin . "</h1></center>"?>
		<article>
			<fieldset>
				<hgroup>
					<h1 style="color: #fff;">Ver Auditorias</h1>
				</hgroup>
				<br /><br />
				<a class="btn" href="paginas/auditorias.php"><span>Accede ya!</span></a>
			</fieldset>
		</article><br />
		<article>
			<fieldset>
				<hgroup>
					<h1 style="color: #fff;">Panel de usuarios</h1>
				</hgroup>
				<br /><br />
				<a class="btn" href="paginas/listado-usuarios.php"><span>Accede ya!</span></a>
			</fieldset>
		</article><br />
		<article>
			<fieldset>
				<hgroup>
					<h1 style="color: #fff;">Salir</h1>
				</hgroup>
				<br /><br />
				<a class="btn" href="paginas/salir.php"><span>Accede ya!</span></a>
			</fieldset>
		</article><br />
	</section>
	<aside>
	
	</aside>
	</section>
	<footer>
		<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
	</footer>
	</section>
</body>
</html>