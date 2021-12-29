<?php
		include('include/header.inc.php');
		initheader("index");
		
		include('include/util.inc.php');
		include('include/fonctions.inc.php');
		
?>

		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#recommendation">Recommendation</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>

	<main>

		<section class="fullbackground">
			<h2 id="recommendation">Nos Films favoris</h2>
			<article>
				<h3>Avengers</h3>				
				<?php
					filmById('tt4154796');
				?>
			</article>

			<article>
				<h3>Guardians of the Galaxy Vol. 2</h3>				
				<?php
					filmById('tt3896198');
				?>
			</article>

			<article>
				<h3>Blade</h3>				
					<?php
						filmById('tt0120611');
					?>
			</article>

			<article>
				<h3>Avatar</h3>				
					<?php
						filmById('tt0499549');
					?>
			</article>
		</section>	

		</main>
		<?php
			include('include/footer.inc.php');
		?>