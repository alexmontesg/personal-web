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
					<li class="active">
						<a href="#">Currículum</a>
					</li>
					<li class="divider"></li>
				</ul>
			</section>
		</nav>

		<header class="row">
			<h2>Currículum</h2>
		</header>
		<div class="row">
			<div class="large-6 large-offset-6 columns hide-for-small">
				<a href="#" class="button expand" data-reveal-id="modalCV">Descarga mi currículum</a>
			</div>
			<div class="show-for-small small-12 columns">
				<a href="files/CV-MontesGarcia-EN.pdf" class="button expand">Descarga mi currículum</a>
			</div>
		</div>

		<div class="row">
			<div data-magellan-expedition="fixed">
				<dl class="sub-nav">
					<dd data-magellan-arrival="cert" >
						<a href="#cert">Certificaciones y premios</a>
					</dd>
					<dd data-magellan-arrival="edu" >
						<a href="#edu">Formación</a>
					</dd>
					<dd data-magellan-arrival="professional">
						<a href="#professional">Profesional</a>
					</dd>
					<dd data-magellan-arrival="projects">
						<a href="#projects">Proyectos</a>
					</dd>
					<dd data-magellan-arrival="publications">
						<a href="#publications">Publicaciones</a>
					</dd>
				</dl>
			</div>
		</div>
		
		<section class="row" id="cert">
			<h3 data-magellan-destination="cert">Certificaciones y premios</h3>
			<div class="large-6 small-12 columns">
				<h4>Certificaciones</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Premios</h4>
			</div>
		</section>
		
		<section class="row" id="edu">
			<h3 data-magellan-destination="edu">Formación</h3>
			<div class="large-6 small-12 columns">
				<h4>Máster en Ingeniería Web</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Ingeniería Técnica en Informática de Sistemas</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Cursos presenciales</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Cursos online</h4>
			</div>
		</section>
		
		<section class="row" id="professional">
			<h3 data-magellan-destination="professional">Profesional</h3>
			<div class="large-6 small-12 columns">
				<h4>Investigador</h4>
			</div>
			<div class="large-6 small-12 columns">
				<h4>Becario de servicios informáticos</h4>
			</div>
		</section>
		
		<section class="row" id="projects">
			<h3 data-magellan-destination="projects">Proyectos</h3>
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
			<h3 data-magellan-destination="publications">Publicaciones</h3>
		</section>

		<div id="modalCV" class="reveal-modal">
			<embed src="files/CV-MontesGarcia-EN.pdf" alt="Currículum de Alejandro Montes García" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
		<?php include_once 'footer.php'; ?>
		
	</body>
</html>
