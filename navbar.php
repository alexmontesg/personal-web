<?php
function createNavbar($active, $admin = FALSE) {
	echo "<nav class='top-bar'>
			<ul class='title-area'>
				<li class='name'>
					<h1><a href='index'>Alejandro Montes García</a></h1>
				</li>
				<li class='toggle-topbar menu-icon'>
					<a href='#'><span>Menú</span></a>
				</li>
			</ul>
			<section class='top-bar-section'>
				<ul class='right'>
					<li class='divider'></li>\n";
	if($active == "biography") {
		echo "					<li class='active'><a href='#'>Biografía</a></li>";
	} else if($admin){
		echo "					<li><a href='../biography'>Biografía</a></li>";	
	} else {
		echo "					<li><a href='biography'>Biografía</a></li>";	
	}
	echo "\n					<li class='divider'></li>\n";
	if($active == "blog") {
		echo "					<li class='active'><a href='#'>Blog</a></li>";
	} else if($admin){
		echo "					<li><a href='../blog'>Blog</a></li>";	
	} else {
		echo "					<li><a href='blog'>Blog</a></li>";	
	}
	echo "\n					<li class='divider'></li>\n";
	if($active == "vitae") {
		echo "					<li class='active'><a href='#'>Corrículum</a></li>";
	} else if($admin){
		echo "					<li><a href='../vitae'>Currículum</a></li>";	
	} else {
		echo "					<li><a href='vitae'>Currículum</a></li>";	
	}
	if($admin) {
		echo "\n					<li class='divider'></li>\n";
		if($active == "adminpanel") {
			echo "					<li class='active'><a href='#'>Panel de administrador</a></li>";
		} else {
			echo "					<li><a href='index'>Panel de administrador</a></li>";
		}
		echo "\n					<li class='divider'></li>";
		if($active == "newpost") {
			echo "					<li class='active'><a href='#'>Nuevo post</a></li>";
		} else {
			echo "					<li><a href='newpost'>Nuevo post</a></li>";
		}
		echo "\n					<li class='divider'></li>
					<li class='has-form'>
						<a href='logout' class='button'>Cerrar sesión</a>
					</li>";
	}
	echo "\n					<li class='divider'></li>
				</ul>
			</section>
		</nav>";
}
?>