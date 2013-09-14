<?php
	include_once 'includes/db_connect.php';
	$query = $db -> prepare("SELECT post_id, title, LEFT(body, 1000) AS body, category FROM posts INNER JOIN categories ON categories.category_id=posts.category_id ORDER BY posted DESC");
	$query -> execute();
	$query -> bind_result($post_id, $title, $body, $category);
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
					<li class="active">
						<a href="#">Blog</a>
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
			<h2>Blog</h2>
		</header>
			<?php
				while ($query -> fetch()) :
					$body = strip_tags($body);
					$lastspace = strrpos($body, ' ');
			?>
			<article>
				<h3><a href="post?id=<?php echo $post_id; ?>"><?php echo $title; ?></a></h3>
				<p><?php echo substr($body, 0, $lastspace); ?></p>
				<p><a href="post?id=<?php echo $post_id; ?>">Continuar leyendo</a></p>
				<p>Archivado en <?php echo $category; ?></p>
			</article>
			<hr />
			<?php endwhile; ?>
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>
