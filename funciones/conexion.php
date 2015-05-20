<?php 

function conectar(){
	
	$server = "localhost";
	$user = "usuario";
	$password = "usuario";
	$database = "bd_enbuscasaber";

	$conexion = mysql_connect($server,$user,$password) or die("Error al establecer una conexion con la base de datos".mysql_error());

	mysql_select_db($database,$conexion) or die("Error al seleccionar la base de datos".mysql_error());

	return $conexion;

}

$conexion = conectar();

?>