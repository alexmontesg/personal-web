<?php include_once 'includes/translate.php'; ?>
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
		<title>Alejandro Montes García - <?php translate('cv'); ?></title>
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
			createNavbar("vitae");
		?>

		<header class="row">
			<h2><?php translate('cv'); ?></h2>
		</header>
		<div class="row">
			<div class="large-6 large-offset-6 columns hide-for-small">
				<a href="#" class="button expand" data-reveal-id="modalCV"><?php translate('downloadCV'); ?></a>
			</div>
			<div class="show-for-small small-12 columns">
				<a href="files/CV-MontesGarcia-EN.pdf" class="button expand"><?php translate('downloadCV'); ?></a>
			</div>
		</div>

		<div class="row">
			<div data-magellan-expedition="fixed">
				<dl class="sub-nav">
					<dd data-magellan-arrival="cert" >
						<a href="#cert"><?php translate('certsAndAwards'); ?></a>
					</dd>
					<dd data-magellan-arrival="edu" >
						<a href="#edu"><?php translate('education'); ?></a>
					</dd>
					<dd data-magellan-arrival="professional">
						<a href="#professional"><?php translate('professional'); ?></a>
					</dd>
					<dd data-magellan-arrival="projects">
						<a href="#projects"><?php translate('projects'); ?></a>
					</dd>
					<dd data-magellan-arrival="publications">
						<a href="#publications"><?php translate('publications'); ?></a>
					</dd>
				</dl>
			</div>
		</div>
		
		<section class="row" id="cert">
			<h3 data-magellan-destination="cert"><?php translate('certsAndAwards'); ?></h3>
			<div class="large-6 small-12 columns">
				<h4><?php translate('certs'); ?></h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4><?php translate('awards'); ?></h4>
			</div>
		</section>
		
		<section class="row" id="edu">
			<h3 data-magellan-destination="edu"><?php translate('education'); ?></h3>
			<div class="large-6 small-12 columns">
				<h4><?php translate('miw'); ?></h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4><?php translate('itis'); ?></h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4><?php translate('courses'); ?></h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4><?php translate('onlineCourses'); ?></h4>
			</div>
		</section>
		
		<section class="row" id="professional">
			<h3 data-magellan-destination="professional"><?php translate('professional'); ?></h3>
			<div class="large-6 small-12 columns">
				<h4><?php translate('researcher'); ?></h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>B<?php translate('intern'); ?></h4>
			</div>
		</section>
		
		<section class="row" id="projects">
			<h3 data-magellan-destination="projects"><?php translate('projects'); ?></h3>
			<div class="large-6 small-12 columns">
				<h4>The Web Index</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>ecoXixón</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>QueYeHo</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Freews</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Orbita</h4>
			</div>
		</section>
		
		<section class="row" id="publications">
			<h3 data-magellan-destination="publications"><?php translate('publications'); ?></h3>
		</section>

		<div id="modalCV" class="reveal-modal">
			<embed src="files/CV-MontesGarcia-EN.pdf" alt="Alejandro Montes García - <?php translate('cv'); ?>" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>
