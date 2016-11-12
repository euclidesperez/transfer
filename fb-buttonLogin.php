<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '319763631739522', // Replace {app-id} with your app id
  'app_secret' => '017504b4ad726c504458d7335541a58b',
  'default_graph_version' => 'v2.7',
  'persistent_data_handler'=>'session'
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/fb-callback.php', $permissions);

echo "<li><a class='action login fb-login' href=".$loginUrl.">Entrar con Facebook</a></li>";
?>