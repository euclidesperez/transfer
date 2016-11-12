<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '319763631739522'; //Facebook App ID
$appSecret = '017504b4ad726c504458d7335541a58b'; // Facebook App Secret
$homeurl = 'http://localhost/facebook_login_with_php/';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
'persistent_data_handler'=>'session'
));
$fbuser = $facebook->getUser();
?>