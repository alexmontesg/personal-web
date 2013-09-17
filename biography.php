<?php include_once 'includes/translate.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <hctml class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Alejandro Montes García - <?php translate('bio')?></title>
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
			createNavbar("biography");
		?>
		<header class="row">
			<h2><?php translate('bio'); ?></h2>
			<div data-magellan-expedition="fixed">
				<dl class="sub-nav">
					<dd data-magellan-arrival="about" >
						<a href="#about"><?php translate('about'); ?></a>
					</dd>
					<dd data-magellan-arrival="contact">
						<a href="#contact"><?php translate('contact'); ?></a>
					</dd>
				</dl>
			</div>
		</header>

		<div>
			<section class="row" id="about">
				<h3 data-magellan-destination="about"><?php translate('about'); ?></h3>
				<p>
					<img src="img/personal/cv.jpg" class="hide-for-small" id="cv-img"/><?php translate('aboutp1'); ?>
				</p>
				<p>
					<?php translate('aboutp2'); ?>
				</p>
				<ul class="clearing-thumbs" data-clearing>
					<li>
						<a class="th" href="img/personal/sporting.jpg" alt="<?php translate('sporting'); ?>"><img data-caption="<?php translate('sporting'); ?>" src="img/personal/sporting-th.jpg" alt="<?php translate('sporting'); ?>"/></a>
					</li>
					<li>
						<a class="th" href="img/personal/british.jpg" alt="<?php translate('british'); ?>"><img data-caption="<?php translate('british'); ?>" src="img/personal/british-th.jpg" alt="<?php translate('british'); ?>"/></a>
					</li>
					<li>
						<a class="th" href="img/personal/stonehenge.jpg" alt="<?php translate('stonehenge'); ?>"><img data-caption="<?php translate('stonehenge'); ?>" src="img/personal/stonehenge-th.jpg" alt="<?php translate('stonehenge'); ?>"/></a>
					</li>
					<li>
						<a class="th" href="img/personal/wallace.jpg" alt="<?php translate('wallace'); ?>"><img data-caption="<?php translate('wallace'); ?>" src="img/personal/wallace-th.jpg" alt="<?php translate('wallace'); ?>"/></a>
					</li>
					<li>
						<a class="th" href="img/personal/throne.jpg" alt="<?php translate('throne'); ?>"><img data-caption="<?php translate('throne'); ?>" src="img/personal/throne-th.jpg" alt="<?php translate('throne'); ?>"/></a>
					</li>
					<li>
						<a class="th" href="img/personal/alcala.jpg" alt="<?php translate('alcala'); ?>"><img data-caption="<?php translate('alcala'); ?>" src="img/personal/alcala-th.jpg" alt="<?php translate('alcala'); ?>"/></a>
					</li>
				</ul>
			</section>
			<section class="row" id="contact">
				<h3 data-magellan-destination="contact"><?php translate('contact'); ?></h3>
				<div class="small-12 large-6 columns">
					<p>
						
					</p>
					<form name="contactForm" id="contactForm" action="" method="POST">
						<fieldset>
							<legend>
								<?php translate('contactIntro'); ?>
							</legend>
							<div class="row">
								<label for="contactName" id="name_label"><?php translate('name'); ?></label>
								<input type="text" required="required" name="contactName" id="contactName"/>
							</div>
							<br>
							<div class="row">
								<label for="contactEmail" id="name_label"><?php translate('email'); ?></label>
								<input type="email" required="required" name="contactEmail" id="contactEmail"/>
							</div>
							<div class="row">
								<label for="contactMessage" id="name_label"><?php translate('message'); ?></label>
								<textarea required="required" name="contactMessage" id="contactMessage"></textarea>
							</div>
							<div class="row">
								<div class="small-12 large-3 large-offset-9 columns">
									<input type="submit" name="submit" class="small button" value="<?php translate('send'); ?>">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="small-12 large-6 columns">
					<?php translate('workplaceIntro'); ?>
					<address>
						<h5><?php translate('workplace'); ?></h5>
						<p>
							<?php translate('workplaceAddress1'); ?>
						</p>
						<p>
							<?php translate('workplaceAddress2'); ?>
						</p>
						<p>
							<?php translate('workplacePhone'); ?>
						</p>
						<?php translate('workplaceMap'); ?>
					</address>
				</div>
			</section>
		</div>

		<?php include_once 'footer.php'; ?>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#contactForm").submit(function(e) {
					$.ajax({
						type : "POST",
						url : "sendmail.php",
						data : $(e.target).serialize(),
						success : function(data) {
							alert(data);
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>
