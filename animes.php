<?php
		include('include/header.inc.php');
		initheader("animes");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#random">Animé aléatoire</a>
					<a href="#film">Animés à succès</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
	<main>

		<section>
            <h2 id="random">Animé aléatoire</h2>            	            	
               <?php
               		if( $_GET['style']=='alternatif') {
						echo '<a href="animes.php?style=alternatif"><img src="image/refresh_white.png" alt="refresh" height="50" width="50"></a>';
					}
					else{
						echo '<a href="animes.php"><img src="image/refresh_black.png" alt="refresh" height="50" width="50"></a>';
					}
	                $id=existingPosterId("animes2.csv");
	                filmById($id);              
               ?>
         </section>

		<section>
			<h2 id="film">Animés à succès</h2>
				<?php
	                albumAnimes(); 
               	?>
		</section>	
		</main>
		<?php
			include('include/footer.inc.php');
		?>