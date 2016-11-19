<?php
require_once "../app/oop/Person.php";

switch ($_SESSION['vendor']) {
	case 'fb':
		echo "facebook login";
		fbUser();
		break;
	case 'gp':
		echo "google login";
		gpUser();
		break;
	default:
		echo "cbid login";
		break;
}
function fbUser(){
	$user_profile = $_SESSION['api_data'];
	//$user = new Users();
	//$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_profile)){
		$_SESSION['user_data']['picture'] = $user_profile['picture']['data']['url'];
		$_SESSION['user_data']['id'] = $user_profile['id'];
		$_SESSION['user_data']['name'] = $user_profile['first_name'];
		$_SESSION['user_data']['last_name'] = $user_profile['last_name'];
		$_SESSION['user_data']['email'] = $user_profile['email'];
		$_SESSION['user_data']['gender'] = $user_profile['gender'];
		$_SESSION['user_data']['locale'] = $user_profile['locale'];
		$_SESSION['user_data']['vendor'] = 'fb';
	}
	
}

function gpUser(){
	$user_profile = $_SESSION['api_data'];
	if(!empty($user_profile)){
		$_SESSION['user_data']['picture'] = $user_profile['picture'];
		$_SESSION['user_data']['id'] = $user_profile['id'];
		$_SESSION['user_data']['name'] = $user_profile['given_name'];
		$_SESSION['user_data']['last_name'] = $user_profile['family_name'];
		$_SESSION['user_data']['email'] = $user_profile['email'];
		$_SESSION['user_data']['gender'] = $user_profile['gender'];
		$_SESSION['user_data']['locale'] = $user_profile['locale'];
		$_SESSION['user_data']['vendor'] = 'gp';
	}
}
?>