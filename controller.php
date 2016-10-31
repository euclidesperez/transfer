<?php
require_once 'app/business/delegate.php';
// route the request internally

$uri = $_SERVER ['REQUEST_URI'];
$tipo = "application/json";

if ($uri == 'controller.php') {
	header('Location: index.html');
	exit;
	
} elseif (strstr($uri, 'provisioning.do') || strstr($uri, 'provisioning.php') ) {
	$catalog = loadCatalog($_GET);
	echo json_encode($catalog);
	
} elseif (strstr($uri, 'register.do') ||strstr($uri, 'register.php')) {
	$id = userRegister($_POST);
	var_dump($id);
	//echo json_encode($id);
	
} else{
	header ( 'Status: 404 Not Found' );
	echo '<html><body><h1>Page Not Found</h1></body></html>';
}

//----------------------------------------
function testJson($var) {
	echo json_encode ( $var );
}

function loadCatalog($getArray){
	$delegate = new Delegate();
	$option = $getArray['option'];
	if(!is_null($option) && !empty($option)){
		return $delegate->getCatalog($option);
	}else{
		throw new Exception('No Catalog Defined');
	}
	
}

function userRegister($var){
	$delegate = new Delegate();
	return $delegate->userRegister($var);
	
}

function getCodEstado($codEstado) {
	$estado = array (
			200 => 'OK',
			201 => 'Created',
			202 => 'Accepted',
			204 => 'No Content',
			301 => 'Moved Permanently',
			302 => 'Found',
			303 => 'See Other',
			304 => 'Not Modified',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			403 => 'Forbidden',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			500 => 'Internal Server Error' 
	);
	$respuesta = ($codEstado) ? $estado [$codEstado] : $estado [500];
	return $respuesta;
}
?>