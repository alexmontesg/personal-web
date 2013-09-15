<footer>
	<div class="row">
		<div class="large-4 small-12 columns">
			<header>
				<p>
					Actualizaciones
				</p>
			</header>
					<ul class="no-bullet">
						<?php
							include_once 'includes/db_connect.php';
							$query = $db -> query("SELECT title, post_id FROM posts ORDER BY posted DESC LIMIT 5");
							while($row = $query -> fetch_object()):
						?>
						<li>
							<a href="/personal-web/post?id=<?php echo $row -> post_id; ?>"><?php echo $row -> title; ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="large-4 small-12 columns">
					<header>
						<p>
							Compañeros
						</p>
					</header>
					<ul class="no-bullet">
						<li>
							<a href="http://www.josemalvarez.es/">Jose María Álvarez Rodríguez</a>
						</li>
						<li>
							<a href="http://juancastro.es/">Juan Castro Fernández</a>
						</li>
						<li>
							<a href="http://www.lukos.org/">Marcos Fermín Lobo</a>
						</li>
						<li>
							<a href="http://di002.edv.uniovi.es/~labra/">Jose Emilio Labra Gayo</a>
						</li>
						<li>
							<a href="http://www.cesarla.com/">César Luis Alvargonzález</a>
						</li>
						<li>
							<a href="http://juanjomarron.com/">Juan José Marrón Monteserín</a>
						</li>
					</ul>
				</div>
				<div class="large-4 small-12 columns">
					<p>
						© Copyright <?php echo date("Y"); ?> Alejandro Montes García
					</p>
				</div>
			</div>
		</footer>
		
		<script>document.write('<script src=/personal-web/js/vendor/' + ('__proto__' in {} ? 'zepto' : 'jquery') + '.js><\/script>');</script>
		<script src="/personal-web/js/vendor/foundation.min.js"></script>
		<script src="/personal-web/js/plugins.js"></script>
		<script src="/personal-web/js/main.js"></script>
		<script>
			$(function() {
				$(document).foundation();
			})
		</script>
		
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']]; ( function(d, t) {
					var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
					g.src = '//www.google-analytics.com/ga.js';
					s.parentNode.insertBefore(g, s)
				}(document, 'script'));
		</script>
