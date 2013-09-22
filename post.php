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
	$posted = translateNoEcho('postedHours1') . ((int) date('H') - (int) $posted -> format('H')) . translateNoEcho('postedHours2');
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
			$success = translateNoEcho('commentSuccess');
		} else {
			$error = translateNoEcho('commentError1');
		}
	} else {
		$error = translateNoEcho('commentError2');
	}
}

$query = $db -> query("SELECT COUNT(*) AS number FROM comments WHERE post_id='$id'");
$comment_count = $query -> fetch_object() -> number;
if($comment_count == 1) {
	$comment_counter = "1 " . translateNoEcho('comment');
} else {
	$comment_counter = $comment_count . " " . translateNoEcho('comments');
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
		<title>Alejandro Montes García - <?php echo $title; ?></title>
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

		<header class="row">
			<h2><?php echo $title; ?></h2>
			<p class="subheader right"><?php echo $posted; ?> <?php translate('by'); ?> <?php echo $username; ?></p>
		</header>
		
		<div class="row">
			<?php echo $body; ?>
		</div>
		<hr class="row" />
		<div class="row">
			<h4><?php translate('postComment'); ?></h4>
			<?php include_once 'includes/error_msg.php'; ?>
			<form action="post?id=<?php echo $id; ?>" method="post">
				<label for="email"><?php translate('commentMail'); ?></label>
				<input type="email" required="required" name="email" />
				<label for="name"><?php translate('name'); ?></label>
				<input type="text" required="required" name="name" />
				<label for="comment"><?php translate('commentComment'); ?></label>
				<textarea name="comment"></textarea>
				<div class="large-2 small-12 large-offset-10 columns">
					<input type="submit" name="submit" value="<?php translate('commentSubmit'); ?>" class="small button expand" />
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