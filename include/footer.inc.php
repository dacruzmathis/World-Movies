	<!-- Footer -->
				<footer>
				<?php
					echo changeDate();			        
				?>
					<p id="bas"><strong><?php echo compteur(); ?></strong> visites pour <strong><?php echo $count; ?></strong> visiteurs différents</p>	
					<p>Navigateur web utilisateur : <strong><?php echo clientBrowser(); ?></strong></p>					
					<p>LELIEVRE Saidou et DA CRUZ Mathis</p>
					<figure>
						<a href="https://www.cyu.fr/"><img src="image/cyu.png" alt="logo Université" height="67" width="200"/></a>
						<figcaption>Université de Cergy</figcaption>
					</figure>
					<p>Licence d’Informatique deuxième année</p>
					<a href="#haut"><img src="image/arrow.png" height="50" width="50" alt="arrow"></a>
				</footer>
		</body>
</html>