<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '937623614135-v1jdm1jiq6f2bousksq0lo6iqhe7phuu.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'p2A58PSk5VvHSixreGJcuoca'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/login-with-google-using-php';  //return url (url to script)
$homeUrl = 'http://localhost/login-with-google-using-php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to transferuk');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>