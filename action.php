<?php
		include('include/header.inc.php');
		initheader("action");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#film">Votre sélection</a>
					<?php 
						geoPlugin(); 
					?>
			</nav>
		</aside>
	<main>

		<?php
			if(isset($_GET["s"])){
				search($_GET["s"],$_GET["type"]);
			}	
			else if(isset($_GET["saison"])){
				last_saison();
				$open = fopen('last_serie.txt', 'c+');
                $serie = fgets($open);
				searchSeasons($serie, $_GET["saison"]);
			}
			else if(isset($_GET["episode"])){
				$open = fopen('last_serie.txt', 'c+');
                $serie = fgets($open);
				$open = fopen('last_saison.txt', 'c+');
                $saison = fgets($open);
				searchEpisodes($serie, $saison, $_GET["episode"]);
			}			
        	else{
				echo'<section>
					<h2 id="film">Votre sélection</h2>';
	
							if(isset($_GET["i"])){
								filmById($_GET["i"]);								
							}
							else if(isset($_GET["serie"])){
								last_series();
								searchSeries($_GET["serie"]);
							}							
							else if(isset($_GET["t"])){
								if(isset($_GET["y"])){
									filmByTitleAndYear($_GET["t"],$_GET["y"]);
								}
								else{
									filmByTitle($_GET["t"]);
								}						
							}	
							else{
								echo "Malheureusement, La recherche n'a retourné aucun résultat.";
							}				
		               	
				echo'</section>';
			}
		?>
		
		</main>

		<?php
			include('include/footer.inc.php');
		?>