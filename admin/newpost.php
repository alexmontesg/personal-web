<?php
session_start();
if(!isset($_SESSION['user_id'])) {
	header('Location: login');
	exit();
}
include_once '../includes/db_connect.php';
if(isset($_POST['submit'])) {
	$title = $_POST['title'];
	$body = $_POST['body'];
	$category = $_POST['category'];
	if($title && $body && $category) {
		$title = strip_tags($title);
		$title = $db -> real_escape_string($title);
		$body = $db -> real_escape_string($body);
		$category = strip_tags($category);
		$category = $db -> real_escape_string($category);
		$user_id = $_SESSION['user_id'];
		$date = date('Y-m-d H:i:s');
		$query = $db -> query("INSERT INTO posts (user_id, title, body, category_id, posted) VALUES ('$user_id', '$title', '$body', '$category', '$date')");
		if($query) {
			$success = "Post publicado correctamente";
		} else {
			$error = "Error publicando el post";
		}
	} else {
		$error = "Falta información para publicar el post";
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
					<li class="active">
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
			<form action="newpost" method="post">
				<?php include_once '../includes/error_msg.php'; ?>
				<label for="title">Título</label>
				<input type="text" name="title" id="title" required="required" />
				<label for="body">Texto</label>
				<textarea name="body" id="body"></textarea>
				<label for="category">Categoría</label>
				<select name="category" id="category">
					<?php
						$query = $db -> query("SELECT * FROM categories");
						while($row = $query -> fetch_object()) {
					?>
					<option value="<?php echo $row -> category_id?>">
						<?php echo $row -> category?>
					</option>
					<?php		
						}
					?>
				</select>
				<div class="large-2 small-12 large-offset-10 columns">
					<input type="submit" name="submit" value="Publicar" class="small button expand" />
				</div>
			</form>
		</div>
		<?php include_once '../footer.php'; ?>
	</body>
</html>