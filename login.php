<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" class="view-login">
<head>
	<meta charset="utf-8">
	<title>TransferUK</title>
	<link rel="stylesheet" href="res/styles/style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<form method="post" action="">
		<header>
			<h1>Bienvenido</h1>
		</header>
		<section class="content">
			<div class="field">
				<label>Usuario/Email</label>
				<input type="text" name="username">
			</div>
			<div class="field">
				<label>Contraseña</label>
				<input type="password" name="password">
			</div>
			<div class="field">
				<label>Confirmacion Contraseña</label>
				<input type="password" name="repassword">
			</div>
		</section>
		<footer>
			<button>Entrar</button>
			<nav>
				<ul>
					<!--
					<li><a class="action login fb-login" href="<?php echo $loginUrl?>">Entrar con Facebook</a></li>
					<li><a class="action login google-login">Entrar con Google</a></li>
					-->
					<?php session_start();?>
					<?php include 'login/fb-button.php';?>
					<?php include 'login/gp-button.php';?>
					
				</ul>
			</nav>
		</footer>
	</form>
	<footer>
		<p>&copy; 2016</p>
	</footer>
</body>
</html>
