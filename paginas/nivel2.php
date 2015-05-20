<?php
// graba registro de auditoria al ingresar al segundo nivel 
$sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." ha ingresado al segundo nivel')";
mysql_query($sql_auditoria, $conexion) or die("Error al Grabar Registro de Auditoria - Ingreso al Nivel 2".mysql_error());
?>
<article>
	<object type="application/x-shockwave-flash" data="../flash/enBuscaDelSaber_vP2.swf" width="550" height="400">
		<param name="movie" value="../flash/enBuscaDelSaber_vP2.swf">
		<param name="movie" align="center">
		<param name="movie" width="550" height="400">
		<param name="play" value="true">
		<embed src="../flash/enBuscaDelSaber_vP2.swf"></embed>
	</object>
	<section id="down-triangle"></section>
</article>
<aside>
	<hgroup>
		<h3 class="h3Style">Tips para jugar bien y poder divertirte al m&aacute;ximo!</h3>
	</hgroup><br />
	<p class="parrafosStyle">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>Primero</b></u>: Manten el orden dentro del aula de clases.<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>Segundo</b></u>: Obedece a tu maestro(a) en las instrucciones que te den.<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>Tercero</b></u>: Concentrate en el juego, para que puedas ganar.<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><b>Cuarto</b></u>: Diviertete lo m&aacute;s que puedas.<br />
	</p>
</aside>
<img style="float: right; margin-left: 2em; position:relative" src="../img/enemy2_mp3.png" title="Hola! no te distraigas :D ">
