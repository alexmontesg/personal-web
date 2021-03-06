<?php
session_start();
if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	include_once 'includes/db_connect.php';
	if (empty($user) || empty($pass)) {
		$error = "Faltan el nombre de usuario o la contraseña";
	} else {
		$user = strip_tags($user);
		$user = $db -> real_escape_string($user);
		$pass = strip_tags($pass);
		$pass = $db -> real_escape_string($pass);
		$pass = md5($pass);
		$query = $db -> query("SELECT user_id FROM users WHERE username='$user' AND password='$pass'");
		if ($query -> num_rows === 1) {
			while ($row = $query -> fetch_object()) {
				$_SESSION['user_id'] = $row -> user_id;
			}
			header('Location: admin/index');
			exit();
		} else {
			$error = "Credenciales incorrectas";
		}
	}
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Alejandro Montes García</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/app.css">
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<script src="js/vendor/custom.modernizr.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		
		<?php
			include_once 'navbar.php';
			createNavbar("none");
		?>

		<div class="row">
			<div class="large-6 small-12 columns large-centered">
				<?php include_once 'includes/error_msg.php'; ?>
				<form action="login" method="post">
					<fieldset>
						<legend>
							Iniciar sesión
						</legend>
						<div class="row">
							<label>Usuario</label>
							<input type="text" required="required" name="username" />
						</div>
						<div class="row">
							<label>Contraseña</label>
							<input type="password" required="required" name="password" />
						</div>
						<div class="large-5 small-12 large-offset-7 columns">
							<input type="submit" name="submit" value="Iniciar sesión" class="button expand" />
						</div>
					</fieldset>
				</form>
			</div>
		</div>

		<?php include_once 'footer.php'; ?>
	</body>
</html>
