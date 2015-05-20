<?php 

// Función de PHP para omitir la salida de advertencias
error_reporting(E_ALL ^ E_NOTICE);

// Funcion de PHP que maneja un arreglo que almacene Gets
function AddGet($ArrayOrString){
		if(is_array($ArrayOrString))
			return http_build_query(array_merge_recursive($GLOBALS['_GET'], $ArrayOrString));
			parse_str($ArrayOrString, $output);
			return http_build_query(array_merge_recursive($GLOBALS['_GET'], $output));
}

// Ejemplo de uso

/* <?php AddGet(array("Clave"=>"Valor")) ?> */ 


// Switch para las paginas principales

$pagina = $_GET["pag"];

switch ($pagina) {

	case 'instrucciones':
		$titulo = "En busca del saber v1.0 - Instrucciones";
		$contenido = "instrucciones.php";
		break;
	
	case 'consejos':
		$titulo = "En busca del saber v1.0 - Consejos";
		$contenido = "consejos.php";
		break;

	case 'acerca':
		$titulo = "En busca del saber v1.0 - Acerca de";
		$contenido = "acerca.php";
		break;

	default:
		$titulo = "En busca del saber v1.0 - Inicio";
		$contenido = "home.php";
		break;
}

// Switch para los niveles del juego

$pagina = $_GET["niv"];

switch ($pagina) {

	case '1':
		$titulo = "En busca del saber v1.0 - Aprendiendo a sumar";
		$contenido = "nivel1.php";
		break;

	case '2':
		$titulo = "En busca del saber v1.0 - Aprendiendo a restar";
		$contenido = "nivel2.php";
		break;

	case '3':
		$titulo = "En busca del saber v1.0 - Aprendiendo a multiplicar";
		$contenido = "nivel3.php";
		break;

	case '4':
		$titulo = "En busca del saber v1.0 - Aprendiendo a dividir";
		$contenido = "nivel4.php";
		break;

	default:
		$titulo = "En busca del saber v1.0 - Inicio";
		$contenido = "home.php";
		break;
}

?>