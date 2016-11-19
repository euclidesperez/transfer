<?php
include_once("config-gp.php");
//include_once("includes/functions.php");

//print_r($_GET);die;

if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	//DB Insert
	//$gUser = new Users();
	//$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
	//echo $userProfile;
	$_SESSION['api_data'] = $userProfile; // Storing Google User Data in Session
	$_SESSION['token'] = $gClient->getAccessToken();
	$_SESSION['vendor']='gp';
	header('Location: ' . filter_var($homeurl.'login/account.php', FILTER_SANITIZE_URL));
	
} else {
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) {
	//echo '<a href="'.$authUrl.'"><img src="images/glogin.png" alt=""/></a>';
	echo '<li><a href="'.$authUrl.'" class="action login google-login">Entrar con Google</a></li>';
} else {
	echo '<a href="logout.php?logout">Logout</a>';
}

?>