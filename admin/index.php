<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header('Location: login');
	exit();
}
include_once '../includes/db_connect.php';
$query = $db->query('SELECT COUNT(*) AS number FROM posts');
$post_count = $query -> fetch_object() -> number;
$query = $db->query('SELECT COUNT(*) AS number FROM comments');
$comment_count = $query -> fetch_object() -> number;
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

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/foundation.min.css">
		<link rel="stylesheet" href="../css/app.css">
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<script src="../js/vendor/custom.modernizr.js"></script>
	</head>
	<body>
		<nav class="top-bar">
			<ul class="title-area">
				<li class="name">
					<h1><a href="../index">Alejandro Montes García</a></h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menú</span></a>
				</li>
			</ul>

			<section class="top-bar-section">
				<ul class="right">
					<li class="divider"></li>
					<li>
						<a href="../biography">Biografía</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="../blog">Blog</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="../vitae">Currículum</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">Nuevo post</a>
					</li>
					<li class="divider"></li>
					<li class="has-form">
						<a href="logout" class="button">Cerrar sesión</a>
					</li>
					<li class="divider"></li>
				</ul>
			</section>
		</nav>
		<div class="row">
			<div class="large-6 small-12 columns large-centered">
				<table>
					<tr>
						<th>Cantidad de posts</th>
						<td><?php echo $post_count ?></td>
					</tr>
					<tr>
						<th>Cantidad de comentarios</th>
						<td><?php echo $comment_count ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php include_once '../footer.php'
		?>
	</body>
</html>
