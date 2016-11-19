<?php
require_once 'app/business/delegate.php';
// route the request internally

$uri = $_SERVER ['REQUEST_URI'];
$tipo = "application/json";
header($tipo);
if ($uri == 'controller.php') {
	header('Location: landing.html');
	exit;
} elseif (strstr($uri, 'login.do')) {
	header('Location: login.php');
} elseif (strstr($uri, 'provisioning.do') || strstr($uri, 'provisioning.php') ) {
	$catalog = loadCatalog($_GET);
	
	echo json_encode($catalog);
	
} elseif (strstr($uri, 'register.do') ||strstr($uri, 'register.php')) {
	if(strstr(strtolower($_SERVER['REQUEST_METHOD']),'post') ){
		$id = register($_POST,$_REQUEST['option']);
		echo json_encode($date=['id'=> $id]);
	}

} elseif (strstr($uri, 'registerAccount.do') ||strstr($uri, 'registerAccount.php')) {
		$id = accountRegister($_POST);
		//syslog(LOG_WARNING,$id);
		echo json_encode($id);
	
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

function register($postArray,$option){
	$delegate = new Delegate();
	if(!is_null($option) && !empty($option)){
		return $delegate->register($postArray,$option);
	}else{
		throw new Exception('No Operation Defined');
	}
		
}

?>