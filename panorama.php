<?php
		include('include/header.inc.php');
		initheader("panorama");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#panorama">Panorama</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
	<main>

		<section>
			<h2 id="panorama">Panorama</h2>
				<?php
	                albumPoster(); 
               ?>
		</section>	
		</main>
		<?php
			include('include/footer.inc.php');
		?>