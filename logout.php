<?php 
include_once("login/config-gp.php");
include_once("login/config-fb.php");

	if($_SESSION['vendor'] === 'gp'){
		unset($_SESSION['token']);		
		$gClient->revokeToken();
		unset($gClient);
	}else{
		$redir_url='http://'.$_SERVER['SERVER_NAME'].'testLF/login.php';
		$logoutUrl = $facebook->getLogoutUrl(array('next'=>$redir_url));
		$facebook->destroySession();		
		unset($facebook);
	}
	unset($_SESSION['api_data']);
	unset($_SESSION['user_data']);
	unset($_SESSION['vendor']);
	session_destroy();
	header("Location: login.php");
 
?>
