<?php
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header('Location: blog');
	exit();
}
$id = $_GET['id'];
include_once 'includes/db_connect.php';
$query = $db -> query("SELECT * FROM posts, users WHERE post_id='$id' AND posts.user_id = users.user_id");
if($query -> num_rows != 1) {
	header('Location: blog');
	exit();
}
$row = $query -> fetch_object();
$title = $row -> title;
$body = $row -> body;
$username = $row -> username;
$posted = new DateTime($row -> posted);
if(date('Ymd') === $posted -> format('Ymd')) {
	$posted = "Hace " . ((int) date('H') - (int) $posted -> format('H')) . " horas";
} else {
	$posted = $posted -> format("d/m/y");	
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

		<nav class="top-bar">
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<h1><a href="index">Alejandro Montes García</a></h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menú</span></a>
				</li>
			</ul>

			<section class="top-bar-section">
				<ul class="right">
					<li class="divider"></li>
					<li>
						<a href="biography">Biografía</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="blog">Blog</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="vitae">Currículum</a>
					</li>
					<li class="divider"></li>
				</ul>
			</section>
		</nav>

		<header class="row">
			<h2><?php echo $title; ?></h2>
			<p class="subheader right"><?php echo $posted; ?> por <?php echo $username; ?></p>
		</header>
		
		<div class="row">
			<?php echo $body; ?>
		</div>
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>