<?php

	error_reporting(E_ALL ^ E_NOTICE);

	include("../funciones/conexion.php");

	if(isset($_POST["btn_registrar"]) && isset($_POST["txt_usuario"]) && isset($_POST["txt_name"]) && isset($_POST["txt_apell"]) && isset($_POST["pwd_clave"]) && isset($_POST["num_edad"]) && isset($_POST["rdo_sexo"])){

		$usuario = $_POST["txt_usuario"];
		$nombre = $_POST["txt_name"];
		$apellido = $_POST["txt_apell"];
		$clave = $_POST["pwd_clave"];
		$clave1 = $_POST["pwd_clave1"];
		$edad = $_POST["num_edad"];
		$sexo = $_POST["rdo_sexo"];

		if($clave == $clave1){
			$sql_reg = "SELECT * FROM tbl_usuario WHERE nusua_usuario = '$usuario'";
			$rs_reg = mysql_query($sql_reg, $conexion) or die("Error al ejecutar la consulta".mysql_error());
			$num_reg = $rs_reg->num_rows;
			if(num_reg > 0){
				$mensaje = "El usuario ". $usuario . " ya existe";
			} else {
				$sql_reg = "";
				$rs_reg = "";
				$sql_reg = "INSERT INTO tbl_usuario(nusua_usuario, nombre_usuario, apellido_usuario, clave_usuario, estatus_usuario, edad_usuario, sexo_usuario) VALUES('$usuario','$nombre','$apellido','$clave','ACTIVO',$edad,'$sexo')";
				$rs_reg = mysql_query($sql_reg, $conexion) or die("Error al ejecutar la consulta".mysql_error());
			if($rs_reg){

    			$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." se ha registrado')";
    			mysql_query($sql_auditoria, $conexion) or die("Error al generar el registro de Auditoria -Registrousuario " . mysql_error());

				$mensaje = $mensaje = "El usuario '". $usuario . "' se ha registrado exitosamente";
			} else {
				$mensaje = "Error al registrar el usuario, por favor intente de nuevo";
			}
			}	
		} else {
		$mensaje = "La clave no coincide por favor intentalo de nuevo";
		}
	} else {
		$mensaje = "Por favor llene todos los campos";
	}

	mysql_close($conexion);

?>
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
				<h1>Resultado del registro</h1>
				<br /> 
			</hgroup>
		</header>
		<section style="text-align:center; ">
			<article style="margin-top: 12em;">
				<?php echo "<h1 style='color: #000;'>$mensaje</h1>"; ?>
			</article>
			<aside style="max-width:65%; margin: 10em auto; text-align:center;">
				<p class="parrafosStyle3"><a href="../index.php">Volver al inicio</a></p>
			</aside>
		</section>
		<footer>
			<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</div>
</body>
</html>