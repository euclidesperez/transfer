<?php
include_once("config-fb.php");
//include_once("includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl.'login.php','scope'=>$fbPermissions));
	//$output = '<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>';
	$output = '<li><a class="action login fb-login" href="'.$loginUrl.'">Entrar con Facebook</a></li>';
	echo $output;
}else{
	$_SESSION['vendor']='fb';
	$_SESSION['api_data']= $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	header('Location: ' . filter_var($homeurl.'login/account.php', FILTER_SANITIZE_URL));
}
?>