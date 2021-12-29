<?php
		include('include/header.inc.php');
		initheader("films");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#random">Film aléatoire</a>
					<a href="#film">Films à succès</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
	<main>

		<section>
            <h2 id="random">Film aléatoire</h2>            	            	
               <?php
               		if( $_GET['style']=='alternatif') {
						echo '<a href="films.php?style=alternatif"><img src="image/refresh_white.png" alt="refresh" height="50" width="50"></a>';
					}
					else{
						echo '<a href="films.php"><img src="image/refresh_black.png" alt="refresh" height="50" width="50"></a>';
					}
	                $id=existingPosterId("movies.csv");
	                filmById($id);              
               ?>
         </section>

		<section>
			<h2 id="film">Films à succès</h2>
				<?php
	                albumFilms(); 
               ?>
		</section>	
		</main>
		<?php
			include('include/footer.inc.php');
		?>