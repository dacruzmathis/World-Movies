<?php
		include('include/header.inc.php');
		initheader("series");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
            <a href="#random">Série aléatoire</a>
					<a href="#serie">Séries à succès</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
	<main>

      <section>
            <h2 id="random">Série aléatoire</h2>
               <?php
                  if( $_GET['style']=='alternatif') {
                     echo '<a href="series.php?style=alternatif"><img src="image/refresh_white.png" alt="refresh" height="50" width="50"></a>';
                  }
                  else{
                     echo '<a href="series.php"><img src="image/refresh_black.png" alt="refresh" height="50" width="50"></a>';
                  }
                  $id=existingPosterId("series.csv");
	              filmById($id);              
               ?>
         </section>

		<section>
			<h2 id="serie">Séries à succès</h2>
				<?php
	                albumSeries(); 
               ?>
		</section>	

		</main>
		<?php
			include('include/footer.inc.php');
		?>