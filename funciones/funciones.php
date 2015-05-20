<?php
//funciones.php

//abre una nueva sesion
function abrirsesion($usuario,$contrasena)
{
    //crea la variable de sesin $_SESSION["idtemp"] con el nombre de usuario,
    //la contrasena y la fecha actual, encriptados mediante la funcion md5() 
    $_SESSION["idtemp"] = md5($usuario . $contrasena . date('dmYGis'));
    
    //establece conexion a la base de datos
    $conexion = conectar();

    //actualiza el registro del usuario seleccionado
    $ssqlidtemp = "UPDATE tbl_usuario "
                . "SET idtemp_usuario = '" . $_SESSION["idtemp"] . "' "
                . "WHERE (nusua_usuario = '" . $usuario . "')";
    $rsidtemp = mysql_query($ssqlidtemp, $conexion) or die("Error al actualizar usuario... " . mysql_error());

    // graba registro de auditoria al iniciar sesion
    $sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario,accion_auditoria) VALUES('".$usuario."','El usuario ".$usuario." inicio sesion')";
    mysql_query($sql_auditoria, $conexion) or die("Error al generar el registro de Auditoria - Abrirsesion" . mysql_error());

    //redirecciona el flujo al archivo menu.php
    header("Location: paginas/inicio.php");
}

//cierra la sesion existente
function cerrarsesion()
{
    //establece conexion a la base de datos
    $conexion = conectar();

    $sql_sesion = "SELECT nusua_usuario FROM tbl_usuario WHERE (idtemp_usuario = '" . $_SESSION["idtemp"] . "')";
    $rs_sesion = mysql_query($sql_sesion, $conexion) or die("Error al Consultar Usuario con Sesion Activa... " . mysql_error());
    $fila_sesion = mysql_fetch_array($rs_sesion);
    $sesion_usuario = $fila_sesion['nusua_usuario'];

    //actualiza el campo idtemp_usua del usuario con sesion activa
    $ssqlidtemp = "UPDATE tbl_usuario "
                . "SET idtemp_usuario = '' "
                . "WHERE (idtemp_usuario = '" . $_SESSION["idtemp"] . "')";
    $rsidtemp = mysql_query($ssqlidtemp, $conexion) or die("Error al actualizar usuario... " . mysql_error());
    
    // graba registro de auditoria al cerrar sesion
    $sql_auditoria = "INSERT INTO tbl_auditoria(nusua_usuario, accion_auditoria) VALUES('".$sesion_usuario."','El usuario ".$sesion_usuario." cerro sesion')";
    mysql_query($sql_auditoria, $conexion) or die("Error al generar el registro de Auditoria - Cerrarsesion " . mysql_error());



    //destruye la sesion anterior
    //limpia la variable de sesion utilizada
    session_unset();
    //destruye la sesion
    session_destroy();
}
?>
