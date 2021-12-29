<?php
		include('include/header.inc.php');
		initheader("watchList");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#list">Ma Liste</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
		<main>
			<?php
				if(isset($_GET['add'])){
					addFilm($_GET['add']);
				}
				if(isset($_GET['supp'])){
					suppFilm($_GET['supp']);
				}								
				displayList();
				if (isEmptyList()==1) {
					echo '<section><h2 id="list">Votre Liste</h2>';
                      echo "<p>Malheureusement votre WatchList est vide pour le moment. Pour y ajouter des films, presser le bouton +</p>";
                      echo '</section>';
				}
			?>		
		</main>

		<?php
			include('include/footer.inc.php');
		?>