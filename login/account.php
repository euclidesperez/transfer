<?php
require_once "../app/oop/Person.php";
session_start();
include 'getDataFromVendor.php';
if(!isset($_SESSION['user_data'])):header("Location:../login.php");endif;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TransferUK</title>
<style type="text/css">
h1
{
font-family:Arial, Helvetica, sans-serif;
color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
	margin: 20px;
	background-color: #EBEBEB;
	padding: 10px;
	border: #D6D6D6 solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box{
	margin: 20px;
	background-color: #FFF0DD;
	padding: 10px;
	border: #F7CFCF solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box .image{ text-align:center;}
</style>
</head>
<body>
<div class="wrapper">
    <h1>Profile Details </h1>
    <?php
    echo '<div class="welcome_txt">Welcome <b>'.$_SESSION['user_data']['name'].'</b></div>';
    echo '<div class="google_box">';
    echo '<p class="image"><img src="'.$_SESSION['user_data']['picture'].'" alt="" width="300" height="220"/></p>';
    echo '<p><b>ID : </b>' . $_SESSION['user_data']['id'].'</p>';
    echo '<p><b>Name : </b>' . $_SESSION['user_data']['name'].'</p>';
    echo '<p><b>Last Name : </b>' . $_SESSION['user_data']['last_name'].'</p>';
    echo '<p><b>Email : </b>' . $_SESSION['user_data']['email'].'</p>';
    echo '<p><b>Gender : </b>' . $_SESSION['user_data']['gender'].'</p>';
    echo '<p><b>Locale : </b>' . $_SESSION['user_data']['locale'].'</p>';
    echo '<p><b>You are login with : </b>'.$_SESSION['user_data']['vendor'].'</p>';
    echo '<p><b>Logout from <a href="../logout.php?logout">Logout</a></b></p>';
    echo '</div>';
    ?>
</div>
</body>
</html>