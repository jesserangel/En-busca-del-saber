<?php

//requiere conexion.php
include("funciones/conexion.php");

//requiere funciones.php
require_once("funciones/funciones.php");

$mensaje = "<span style='color: #000; text-align:center;''>Indique su nombre de usuario y contrase&ntilde;a</span>";

if (isset($_POST["txt_user"]) && isset($_POST["pwd_pass"])) {
    if ($_POST["txt_user"] != "" && $_POST["pwd_pass"] != "") {
        //verifica nombre y la contrasena del usuario
        $sqlverificar = "SELECT * FROM tbl_usuario WHERE (nusua_usuario = '" . $_POST["txt_user"] . "' AND " 
        	. "clave_usuario = '" . $_POST["pwd_pass"] . "')";
        $rsverificar = mysql_query($sqlverificar, $conexion) or die(mysql_error());
        //si existe el usuario
        if (mysql_num_rows($rsverificar) > 0) {
            $fila = mysql_fetch_array($rsverificar);
            //verifica el estatus del usuario
            //si el estatus es activo
            if ($fila["estatus_usuario"] == "ACTIVO") {
                $mensaje = "El usuario " . $_POST["txt_user"] . " esta ACTIVO";
                //inicia sesion
                session_start();
                //si no existe la variable de sesion idtemp
                if(!isset($_SESSION["idtemp"])) {
                    //abre una nueva sesion
                    abrirsesion($fila["nusua_usuario"], $fila["clave_usuario"]);
                }
                else {
                    //cierra la sesion anterior
                    cerrarsesion();
                    //inicia sesion	
                    session_start();
                    //abre una nueva sesion
                    abrirsesion($fila["nusua_usuario"], $fila["clave_usuario"]);
                }
            }
            //si el estatus es inactivo
            elseif ($fila["estatus_usuario"] == "INACTIVO") {
                $mensaje = "<span style='color: #F70'>El usuario " . $fila["nusua_usuario"] . " se encuentra Inactivo</span>";
            }
        }
        //si no existe el registro de usuario
        else {
            $mensaje = "<span style='color: #F00'>El usuario o la contrase&ntilde;a son inv&aacute;lidos</span>";
        }
    }
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
</head>
<body>
	<section id="cuerpoPrincipal">
		<header>
			<hgroup>
				<br /> 		
				<h1>En Busca del Saber v1.0</h1>
				<br /> 
			</hgroup>
		</header>
		<section style="text-align:center; ">
			<h2 style="margin-top: 3em;"><?php echo $mensaje; ?></h2>
			<article style="max-width:30%; display: inline-block; vertical-align:middle;">
				<img style="margin-left:2em; width:250px; height:400px;" src="img/personaje_logo.png" />
			</article>
			<article style="max-width:65%; margin-left: 10em; display: inline-block; vertical-align:middle;">
				<fieldset>
					<form name="frm_ingreso" action="index.php" method="POST">
						<label for="txt_user">Usuario: </label>
						<input type="text" name="txt_user" id="txt_user" title="Ingresa tu nombre de usuario" required /><br />
						<label for="pwd_pass">Clave: </label>
						<input type="password" name="pwd_pass" id="pwd_pass" title="Ingresa tu clave" maxlength="16" required /><br />
						<input class="btn" type="submit" name="btn_ingresar" value="Ingresar" />
					</form>
				</fieldset>
			</article>
			<aside style="max-width:65%; margin: 5em auto; text-align:center;">
				<p class="parrafosStyle3">¿No posees una cuenta?&nbsp;&nbsp;<a href="paginas/registro.php">Registrate ahora!</a></p>
			</aside>
		</section>
		<footer>
			<p>JRangel Creaciones 2013. Todos los Derechos Reservados.</p>
		</footer>
	</section>
</body>
</html>