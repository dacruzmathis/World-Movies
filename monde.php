<?php
		include('include/header.inc.php');
		initheader("monde");
		include('include/util.inc.php');
		include('include/fonctions.inc.php');

?>
		<!-- Aside -->
		<aside >
			<nav  class="sidenav"> 
				<p class="bigger"><strong>World Movie</strong></p>
					<a href="#dispos">Films disponibles</a>
               <?php 
                  geoPlugin(); 
               ?>
			</nav>
		</aside>
	<main>
		<section class="fullbackground">
			<h2 id="dispos">Nos Films disponibles</h2>
			<article>
				<h3>Tout les films</h3>
               <table>
                  <thead>
                     <tr>
                        <th>Films Disponibles</th>
                     </tr>
                  </thead>
                  <tbody>
               <?php  

                        function films($dir){
                           $filename = $dir;
                           $total = count(file($filename));
                           $handle = fopen($filename, "r");
                           $line = fgets($handle);
                           $i = 0;
                           while ($i <= ($total-2)) {
                              $line = fgets($handle);
                              $seperator = explode(",", (string)$line);
                              echo "<tr><td>".$seperator[2]."</td></tr>\n\t\t\t";
                              $i++;
                           }
                        }  
                        films("movies.csv");                                                    
                ?>
                </tbody>
               </table>

			</article>
		</section>	
		</main>
		<?php
			include('include/footer.inc.php');
		?>