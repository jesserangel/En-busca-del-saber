<?php
//validasesion.php

//incluye conexion.php
require_once("conexion.php");

//inicia sesion	
session_start();

//si no existe la variable de sesion idtemp o si su valor es vacio
if (!isset($_SESSION["idtemp"]) || $_SESSION["idtemp"] == "") {
		//si hubo sesion iniciada por usuario
		if (isset($usuario)) {
				//establece conexion a la base de datos
				$conexion = conectar();
				//actualiza el campo idtemp_usua del usuario con sesion iniciada
				$ssqlidtemp = "UPDATE tbl_usuario "
						. "SET idtemp_usuario = '' "
						. "WHERE (nusua_usuario = '" . $usuario . "')";
				$rsidtemp = mysql_query($ssqlidtemp, $conexion) or die("Error al actualizar usuario... " . mysql_error());
		}
		//redirecciona el flujo al archivo index.php
        ?>
        <script language="javascript">
        <?php
          if(file_exists("index.php")) {
        ?>
            var pagina = "index.php";
        <?php
          } else {
        ?>
            var pagina = "../index.php";
        <?php
          }        
        ?>
            parent.parent.location.href=pagina;
        </script>
        <?php
}
else {
		//establece conexion a la base de datos
		$conexion = conectar();
		//selecciona los campos del usuario con sesion activa
		$ssqlusuario = "SELECT * FROM tbl_usuario WHERE (idtemp_usuario = '" . $_SESSION["idtemp"] . "')";
		$rsusuario = mysql_query($ssqlusuario, $conexion) or die("Error al consultar usuario con sesi&oacute;n activa... " . mysql_error());
		//crea la variable $usuario
		$filausuario = mysql_fetch_array($rsusuario);
		$usuario = $filausuario["nusua_usuario"];
}
?>
