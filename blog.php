<?php
	include_once 'includes/db_connect.php';
	$query = $db -> query('SELECT COUNT(*) AS number FROM posts');
	$post_count = $query -> fetch_object() -> number;
	$per_page = 5;
	$pages = ceil($post_count / $per_page);
	if(isset($_GET['page']) && is_numeric($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	if($page < 1) {
		$page = 1;
	}
	if($page > $pages) {
		$page = $pages;
	}
	$start = ($page - 1) * $per_page;
	$prev = $page - 1;
	$next = $page + 1;
	$query = $db -> prepare("SELECT post_id, title, LEFT(body, 1000) AS body, category FROM posts INNER JOIN categories ON categories.category_id=posts.category_id ORDER BY posted DESC LIMIT $start, $per_page");
	$query -> execute();
	$query -> bind_result($post_id, $title, $body, $category);
	include_once 'includes/translate.php';
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
		<title>Alejandro Montes García - <?php translate('blog'); ?></title>
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
			createNavbar("blog");
		?>
		<header class="row">
			<h2><?php translate('bio'); ?></h2>
		</header>
			<?php
				while ($query -> fetch()) :
					$body = strip_tags($body);
					$lastspace = strrpos($body, ' ');
			?>
			<article class="row">
				<h3><a href="post?id=<?php echo $post_id; ?>"><?php echo $title; ?></a></h3>
				<p><?php echo substr($body, 0, $lastspace); ?></p>
				<p><a href="post?id=<?php echo $post_id; ?>"><?php translate('readMore'); ?></a></p>
				<p><?php translate('categoryBlog'); ?> <?php echo $category; ?></p>
			</article>
			<hr />
			<?php endwhile; ?>
			<div class="pagination-centered">
				<ul class="pagination">
					<?php
					if($prev > 0 && $prev - 1 > 0) {
					?>
					<li class="arrow"><a href="blog">&laquo;</a></li>
					<?php	
					} if($prev > 0) {
					?>
					<li><a href="blog?page=<?php echo $prev; ?>"><?php echo $prev; ?></a></li>
					<?php
					}
					?>
					<li class="current"><a href="#"><?php echo $page; ?></a></li>
					<?php
					if($next <= $pages) {
					?>
					<li><a href="blog?page=<?php echo $next; ?>"><?php echo $next; ?></a></li>
					<?php
					} if($next < $pages) {
					?>
					<li class="arrow"><a href="blog?page=<?php echo $pages; ?>">&raquo;</a></li>
					<?php
					}
					?>
			</ul>
			</div>
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>
