<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header('Location: login');
	exit();
}
include_once '../includes/db_connect.php';
$query = $db -> query('SELECT COUNT(*) AS number FROM posts');
$post_count = $query -> fetch_object() -> number;
$query = $db -> query('SELECT COUNT(*) AS number FROM comments');
$comment_count = $query -> fetch_object() -> number;

if (isset($_POST['submit'])) {
	$category = $_POST['category'];
	if(!empty($category)) {
		$category = strip_tags($category);
		$category = $db -> real_escape_string($category);
		$query = $db -> query("INSERT INTO categories (category) VALUES ('$category')");
		if($query) {
			$success = "Categoría '$category' añadida correctamente";
		} else {
			$error = "Error añadiendo categoría";
		}
	} else {
		$error = "Falta la categoría para añadir";
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
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/foundation.min.css">
		<link rel="stylesheet" href="../css/app.css">
		<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<script src="../js/vendor/custom.modernizr.js"></script>
	</head>
	<body>
		<?php
			include_once '../navbar.php';
			createNavbar("adminpanel", TRUE);
		?>
		<div class="row">
			<div class="large-6 small-12 columns large-centered">
				<table>
					<tr>
						<th>Cantidad de posts</th>
						<td><?php echo $post_count; ?></td>
					</tr>
					<tr>
						<th>Cantidad de comentarios</th>
						<td><?php echo $comment_count; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="large-8 small-12 columns large-centered">
				<?php include_once '../includes/error_msg.php'; ?>
				<form action="index" method="post">
					<div class="large-8 small-8 columns">
						<div class="large-4 small-4 columns">
							<label for="category" class="right inline">Categoría</label>
						</div>
						<div class="large-8 small-8 columns">
							<input type="text" name="category" id="category" required="required" />
						</div>
					</div>
					<div class="large-4 small-4 columns">
						<input type="submit" name="submit" class="small button expand" value="Añadir" />
					</div>
				</form>
			</div>
		</div>
		<?php include_once '../footer.php'; ?>
	</body>
</html>
