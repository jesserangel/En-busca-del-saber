<!DOCTYPE HTML>
<html lang="es-VE">
<head>
	<title>En Busca del Saber v1.0- Registro</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/modernizr.js" ></script>
	<script type="text/javascript" src="../p-in/selectivizr-min.js"></script>
	<!--[if (gte IE 6)&(lte IE 8)]>
  		<script type="text/javascript" src="../selectivizr.js"></script>
  		<noscript><link rel="stylesheet" href="../css/estilos.css" /></noscript>
	<![endif]-->
</head>
<body>

	<div id="cuerpoPrincipal">
		<header>
			<hgroup>
				<br /> 		
				<h1>Registro de usuario</h1>
				<br /> 
			</hgroup>
		</header>
		<section style="text-align:center; ">
			<article style="max-width:30%; display: inline-block; vertical-align:middle;">
				<img style="width:400px; height:350px;" src="../img/enemy1_tv_cabeza.png" />
			</article>
			<article style="max-width:65%; margin-left: 10em; display: inline-block; vertical-align:middle;">
				<fieldset>
					<form name="frm_ingreso" action="gestion-usuarios.php" method="POST">
						<div align="justify">
						<label for="txt_usuario">Nombre de usuario: </label>
						<input type="text" name="txt_usuario" id="txt_usuario" title="Ingresa tu nuevo nombre de usuario" required /><br />
						<label for="txt_name">Tu nombre real: </label>
						<input type="text" name="txt_name" id="txt_name" title="Ingresa tu nombre" required /><br />
						<label for="txt_apell">Tu apellido: </label>
						<input type="text" name="txt_apell" id="txt_apell" title="Ingresa tu apellido" required /><br />
						<label for="pwd_clave">Clave: </label>
						<input type="password" name="pwd_clave" id="pwd_clave" title="Ingresa tu nueva clave" maxlength="16" required /><br />
						<label for="pwd_clave1">Confirmar la clave: </label>
						<input type="password" name="pwd_clave1" id="pwd_clave1" title="Confirma tu nueva clave" maxlength="16" required /><br />
						<label for="num_edad">Edad: </label>
						<input type="number" name="num_edad" id="num_edad" min="5" max="12" value="5" title="Ingresa tu edad, del 5 - 12" required /><br /><br /><br />
						<label for="m">Sexo: &nbsp;</label>
						<input type="radio" id="m" name="rdo_sexo" title="Masculino" value="M" required />&nbsp;<label for="m">Masculino</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" id="m" name="rdo_sexo" title="Femenino" value="F" />&nbsp;<label for="f">Femenino</label><br /><br />
						</div>
						<input class="btn" type="submit" name="btn_registrar" value="Registrarse" />		
					</form>
				</fieldset>
			</article>
			<aside style="max-width:65%; margin: 5em auto; text-align:center;">
				<p class="parrafosStyle3"><a href="../index.php">Volver a la pagina anterior</a></p>
			</aside>
		</section>
		<footer>
			<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</div>
</body>
</html>