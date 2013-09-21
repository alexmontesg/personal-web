<?php
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header('Location: blog');
	exit();
}
$id = $_GET['id'];
include_once 'includes/db_connect.php';
include_once 'includes/translate.php';
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
if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	if($email && $name && $comment) {
		$email = strip_tags($email);
		$email = $db -> real_escape_string($email);
		$name = strip_tags($name);
		$name = $db -> real_escape_string($name);
		$id = strip_tags($id);
		$id = $db -> real_escape_string($id);
		$comment = strip_tags($comment);
		$comment = str_replace(array("\r\n", "\n", "\r"), '<br />', $comment);
		$comment = $db -> real_escape_string($comment);
		$date = date('Y-m-d H:i:s');
		$query = $db -> query("INSERT INTO comments(name, post_id, email_add, comment, commented_on) VALUES ('$name', '$id', '$email', '$comment', '$date')");
		if($query) {
			$success = "Gracias, tu comentario ha sido añadido";
		} else {
			$error = "Error añadiendo comentario" . $email . $name . $comment . $id . $date;
		}
	} else {
		$error = "Faltan datos para enviar el comentario";
	}
}

$query = $db -> query("SELECT COUNT(*) AS number FROM comments WHERE post_id='$id'");
$comment_count = $query -> fetch_object() -> number;
if($comment_count == 1) {
	$comment_counter = "1 comentario";
} else {
	$comment_counter = $comment_count . " comentarios";
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php translate('lang'); ?>">
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
		<hr class="row" />
		<div class="row">
			<h4>Publica un comentario</h4>
			<?php include_once 'includes/error_msg.php'; ?>
			<form action="post?id=<?php echo $id; ?>" method="post">
				<label for="email">Correo electrónico (no se mostrará)</label>
				<input type="email" required="required" name="email" />
				<label for="name">Nombre</label>
				<input type="text" required="required" name="name" />
				<label for="comment">Comentario</label>
				<textarea name="comment"></textarea>
				<div class="large-2 small-12 large-offset-10 columns">
					<input type="submit" name="submit" value="Comentar" class="small button expand" />
				</div>
			</form>
		</div>
		<div class="row">
			<h4 class="right"><?php echo $comment_counter; ?></h4>
		</div>
		<?php
			$query = $db -> query("SELECT name, comment FROM comments WHERE post_id='$id' ORDER BY commented_on ASC");
			$first = TRUE;
			while($row = $query -> fetch_object()):
				if($first) {
					$first = false;
				} else {
					echo "<hr class='row'/>";
				}
		?>
		<article class="row">
			<h5><?php echo $row -> name ?></h5>
			<blockquote><?php echo $row -> comment ?></blockquote>
		</article>
		<?php endwhile; ?>
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>