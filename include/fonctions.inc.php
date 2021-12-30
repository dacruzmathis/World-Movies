<?php
							function multiplication0() {
								echo'<table> ';	   
								for($i=1;$i<=10;$i++){
									echo'<tr>';
								for($j=1;$j<=10;$j++){
									$resultat=$i*$j;
									echo' <td>'.$resultat.'</td>';
																
								}
									echo'</tr>';
								}
									echo'</table>';
								} 
?>

<?php

						function conversion($nbr) {
									echo'<tr>
										<td style="background-color: turquoise;"> binaire</td>
										<td style="background-color: turquoise;"> octal</td>
										<td style="background-color: turquoise;"> Decimal</td>
										<td style="background-color: turquoise;"> hexadecimal</td>
										</tr>';
													
													
										for($i=0;$i<=$nbr;$i++) {
														
											$binaire=decbin($i);
											echo'<tr> <td>'.$binaire.'</td>';
											$octal=decoct($i);
											echo'<td>'.$octal.'</td>';
											$decimal=$i;
											echo'<td>'.$decimal.'</td>';
											$hexa=dechex($i);
											echo'<td>'.$hexa.'</td>';
											echo'</tr>';
												}
											}



									function multiplication($nb1) {
							echo'<table> ';
							for($i=1;$i<=$nb1;$i++){
								echo'<tr>';
								for($j=1;$j<=$nb1;$j++){
									$resultat=$i*$j;
									echo' <td>'.$resultat.'</td>';
													
								}
								echo'</tr>';
							}
							echo'</table>';
						} 
?>

<?php

					  DEFINE("Max",17);
                        function conversion2($N=Max) {
                            echo"<table>";
                                echo"<thead>";
                                    echo"<tr>";
                                      echo"\t<th>binaire</th>\n";
                                      echo"\t<th>octal</th>\n";
                                      echo"\t<th>décimal</th>\n";
                                      echo"\t<th>hexadécimal</th>\n";
                                    echo"</tr>";
                                  echo"</thead>";
                                  echo"\n";
                                  echo"<tbody>";
                                      for($k = 0 ; $k <= $N ; $k++) {
                                          echo"<tr>";
                                              echo"<td>".sprintf("%08d",decbin($k))."</td>\n";
                                              echo"<td>".sprintf("%02d",decoct($k))."</td>\n";
                                              echo"<td>".sprintf("%02d",$k)."</td>\n";
                                              echo"<td>".sprintf("%02X",$k)."</td>\n";
                                          echo"</tr>";
                                      }
                                  echo"</tbody>";
                              echo"</table>";
                        }


?>

<?php
                      function tableAscii() {
								        echo "<table>\n";
								        echo "<tr><th> &#x00A0; </th>";
								        for ($colonne = 0 ; $colonne <= 0xF ; $colonne++ ) {
								            echo "<th>".strtoupper(dechex($colonne))."</th>";
								        }
								        echo "</tr>\n";
								        for ($ligne = 2 ; $ligne <= 7 ; $ligne++ ) {
								            echo "<tr><th>".$ligne."</th>";
								            for ($colonne = 0 ; $colonne <= 0xF ; $colonne++ ) {
								                $carValue = $ligne * 16 + $colonne;
								                $class="";
								                if ($carValue >= 0x30 && $carValue <= 0x39) {
								                    $class = " class=\"red\"";
								                }
								                if ($carValue >= 0x41 && $carValue <= 0x5A) {
								                    $class = " class=\"green\"";
								                }
								                if ($carValue >= 0x61 && $carValue <= 0x7A) {
								                    $class = " class=\"blue\"";
								                }
								                echo "<td".$class.">".($carValue == 127 ? "&#x00A0;" : htmlspecialchars(chr($carValue)))."</td>";
								            }
								            echo "</tr>\n";
								        }
								        echo "</table>\n";
								    }
								    
?>

<?php
                        function regionList(bool $value){
                           $regions = array("Guadeloupe", "Martinique", "Guyane", "La Réunion", "Mayotte", "Île-de-France", "Centre-Val de Loire", "Bourgogne-Franche-Comté", "Normandie", "Hauts-de-France", "Grand Est", "Pays de la Loire", "Bretagne", "Nouvelle-Aquitaine", "Occitanie", "Auvergne-Rhône-Alpes", "Provence-Alpes-Côte d’Azur", "Corse");
                           if ($value) {
                              echo"<ul>";
                              foreach ($regions as &$i){
                                 echo "<li>".$i."</li>\n";
                              }
                              echo"</ul>";
                           }
                           else{
                              echo"<ol>";
                              foreach ($regions as &$i){
                                 echo "<li>".$i."</li>\n";
                              }
                              echo"</ol>";
                           }                           
                        }
           ?>                                                                   

<?php
           function changeDate(){
                        if(empty($_GET['lang'])){
                           echo displayDate("fr");
                        }
                        if (isset($_GET['lang'])){
                           if( $_GET['lang']=='fr') {
                              echo displayDate("fr");
                           }
                           else {
                              echo displayDate("en");
                           }
                        }
                     }
 ?>

<?php
                     DEFINE ("CHOICE","choice");
                     function choices($num,$name=CHOICE){
                              echo "<select name='".$name."'>";
                              foreach ($num as &$i){
                                 echo "<option value='".$i."'>".$i."</option>\n\t\t\t";
                              }  
                              echo "</select>";                                            
                     }  
                     ?>

<?php        
                        DEFINE ("NOTHING","");          
                        function permission(int $num, string $var=NOTHING) : string {  
                           $save = $num;                  
                           $chain = array(2);      
                           for ($i=2; $i >= 0; $i--) {    
                              $chain[$i] = $num%10;                    
                              $num /= 10;
                           }
                           $tab = array(2);
                           for ($i=0; $i <= 2; $i++) {
                              switch ($chain[$i]){
                                 case 0:
                                    $tab[$i] = " ---";
                                    break;
                                 case 1:
                                    $tab[$i] = " --x";
                                    break;
                                 case 2:
                                    $tab[$i] = " -w-";
                                    break;
                                 case 3:
                                    $tab[$i] = " -wx";
                                    break;
                                 case 4:
                                    $tab[$i] = " r--";
                                    break;
                                 case 5:
                                    $tab[$i] = " r-x";
                                    break;
                                 case 6:
                                    $tab[$i] = " rw-";
                                    break;
                                 case 7:
                                    $tab[$i] = " rwx";
                                    break;
                              }
                           }
                           $result = "<p>".$save." =>".$var.$tab[0].$tab[1].$tab[2]."</p>";
                           return $result;  
                        }
                     ?>

                     <?php  
                        function randomId($dir){
                           $liste = array();
                           $filename = $dir;
                           $total = count(file($filename));
                           $handle = fopen($filename, "r");
                           $line = fgets($handle);
                           $i = 0;
                           while ($i <= ($total-2)) {
                              $line = fgets($handle);
                              $seperator = explode(",", (string)$line);
                              $liste[$i] = $seperator[0];
                              $i++;
                           }
                           $count = 0;
                           foreach ($liste as $i) {
                              $count ++;
                           }
                           $num = rand (0, ($count-1));
                           return $liste[$num];
                        }                                                                           
                ?>

                <?php  
                        function randomTitle($dir){
                           $liste = array();
                           $filename = $dir;
                           $total = count(file($filename));
                           $handle = fopen($filename, "r");
                           $line = fgets($handle);
                           $i = 0;
                           while ($i <= ($total-2)) {
                              $line = fgets($handle);
                              $seperator = explode(",", (string)$line);
                              $liste[$i] = $seperator[1];
                              $i++;
                           }
                           $count = 0;
                           foreach ($liste as $i) {
                              $count ++;
                           }
                           $num = rand (0, ($count-1));
                           return $liste[$num];
                        }                                                                           
                ?>

                <?php 
                  function getTitleById($id){
                    $api_key = '1495fa1f';
                    $imdb_movie_id = $id;
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?i='.$imdb_movie_id.'&plot=full&apikey='.$api_key.''), true);
                    $title = $data['Title'];
                    return $title;
                  }
                ?>
                 
                <?php  

                  function filmById($id){
                    $api_key = '1495fa1f';
                    $imdb_movie_id = $id;
                    if(empty($api_key)){
                       echo 'Get API key from http://www.omdbapi.com/';
                       die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?i='.$imdb_movie_id.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);
                    echo linkPosterId($id);
                    echo '
                    <hr/>
                    Title: <strong>'.$data['Title'].'</strong><br/>
                    Year: '.$data['Year'].'<br/>
                    Genre: '.$data['Genre'].'<br/>
                    Actors : '.$data['Actors'].'<br/>
                    Plot: '.$data['Plot'].'<br/>
                    Runtime: '.$data['Runtime'].'<br/>
                    IMDB Rating: <strong>'.$data['imdbRating'].'</strong> / 10 ('.$data['imdbVotes'].')<br/>';
                    add_stats($id);  
                    watchList($id);                 
                 }  
                                                                         
                ?>

                <?php
                  function filmByTitle($title){
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$title.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);
                    if (is_null($data['Title'])){
                      echo "Malheureusement, La recherche n'a retourné aucun résultat.";
                    }
                    else{                      
                      echo linkPosterTitle($title); 
                      echo '
                      <hr/>
                      Title: <strong>'.$data['Title'].'</strong><br/>
                      Year: '.$data['Year'].'<br/>
                      Genre: '.$data['Genre'].'<br/>
                      Actors : '.$data['Actors'].'<br/>
                      Plot: '.$data['Plot'].'<br/>
                      Runtime: '.$data['Runtime'].'<br/>
                      IMDB Rating: <strong>'.$data['imdbRating'].'</strong> / 10 ('.$data['imdbVotes'].')<br/>
                      ';
                      add_stats($data['imdbID']);
                      watchList($data['imdbID']);
                    }                  
                  }                 
                ?>

                <?php
                  function filmByTitleAndYear($title, $year){
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$title.'&y='.$year.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);
                    
                    if (is_null($data['Title'])){
                      echo "Malheureusement, La recherche n'a retourné aucun résultat.";
                    }
                    else{                      
                      echo linkPosterTitleAndYear($title, $year); 
                      echo '
                      <hr/>
                      Title: <strong>'.$data['Title'].'</strong><br/>
                      Year: '.$data['Year'].'<br/>
                      Genre: '.$data['Genre'].'<br/>
                      Actors : '.$data['Actors'].'<br/>
                      Plot: '.$data['Plot'].'<br/>
                      Runtime: '.$data['Runtime'].'<br/>
                      IMDB Rating: <strong>'.$data['imdbRating'].'</strong> / 10 ('.$data['imdbVotes'].')<br/>
                      ';
                      add_stats($data['imdbID']);
                      watchList($data['imdbID']);
                    }                  
                  }                 
                ?>

                <?php  
                  function getPosterId($id){
                    $api_key = '1495fa1f';
                    $imdb_movie_id = $id;
                    if(empty($api_key)){
                       echo 'Get API key from http://www.omdbapi.com/';
                       die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?i='.$imdb_movie_id.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);  
                    $result = $data['Poster'];
                    return $result;
                 }                                                                           
                ?>

                <?php  
                  function getPosterTitle($title){
                    $api_key = '1495fa1f';
                    $t = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                       echo 'Get API key from http://www.omdbapi.com/';
                       die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$t.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);  
                    $result = $data['Poster'];   
                    return $result;
                 }                                                                           
                ?>

                <?php  
                  function getPosterTitleAndYear($title, $year){
                    $api_key = '1495fa1f';
                    $t = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                       echo 'Get API key from http://www.omdbapi.com/';
                       die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$t.'&y='.$year.'&plot=full&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);  
                    $result = $data['Poster'];   
                    return $result;
                 }                                                                           
                ?>

                <?php  
                  function albumPoster(){
                    echo"<table>";
                    echo"<tbody>";
                    echo "<tr>";
                    $i=0;
                    while($i<10){
                      if ($i%5==0 && $i!=0) {
                        echo "</tr><tr>";
                      }  
                      $id=existingPosterId("movies.csv");     
                      if( $_GET['style']=='alternatif') {                 
                        echo "<td class='square'><a href='action.php?style=alternatif&i=".$id."#film'><img class='square' src=".getPosterId($id)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      else{
                        echo "<td class='square'><a href='action.php?i=".$id."#film'><img class='square' src=".getPosterId($id)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      $i++;
                    }
                    echo "</tr>"; 
                    echo"</tbody>";
                    echo"</table>";                   
                 }                                                                           
                ?>

                <?php  
                  function linkPosterTitle($title){
                    if( $_GET['style']=='alternatif') {                 
                        echo "<a href='action.php?style=alternatif&t=".$title."#film'><img src=".getPosterTitle($title)." alt='film'/></a>";
                      }
                      else{
                        echo "<a href='action.php?t=".$title."#film'><img src=".getPosterTitle($title)." alt='film'/></a>";
                      }                                
                 }                                                                           
                ?>

                <?php  
                  function linkPosterTitleAndYear($title, $year){
                    if( $_GET['style']=='alternatif') {                 
                        echo "<a href='action.php?style=alternatif&t=".$title."&y=".$year."#film'><img src=".getPosterTitleAndYear($title, $year)." alt='film'/></a>";
                      }
                      else{
                        echo "<a href='action.php?t=".$title."&y=".$year."#film'><img src=".getPosterTitleAndYear($title, $year)." alt='film'/></a>";
                      }                             
                 }                                                                           
                ?>

                <?php  
                  function linkPosterId($id){
                    if( $_GET['style']=='alternatif') {                 
                        echo "<a href='action.php?style=alternatif&i=".$id."#film'><img src=".getPosterId($id)." alt='film'/></a>";
                      }
                      else{
                        echo "<a href='action.php?i=".$id."#film'><img src=".getPosterId($id)." alt='film'/></a>";
                      } 
                                
                 }                                                                           
                ?>

                <?php  
                  function existingPosterId($file){
                    $id=randomId("$file");
                    $essais = get_headers(getPosterId($id), 1);
                    while (!isExistPosterId($id)){
                        $id=randomId("$file");
                    }  
                    return $id;          
                 }                                                                           
                ?>

                <?php  
                  function existingPosterTitle(){
                    $title=randomTitle("movies.csv");
                    $essais = get_headers(getPosterTitle($title), 1);
                    while (!isExistPosterTitle($title)){
                        $title=randomTitle("movies.csv");
                    }  
                    return $title;          
                 }                                                                           
                ?>

                <?php  
                  function isExistPosterId($id){
                    $essais = get_headers(getPosterId($id), 1);
                    return (preg_match("#OK#i", $essais[0]));          
                 }                                                                           
                ?>

                <?php  
                  function isExistPosterTitle($title){
                      $essais = get_headers(getPosterTitle($title), 1);
                      return (preg_match("#OK#i", $essais[0]));       
                 }                                                                           
                ?>

                <?php  
                  function albumFilms(){
                    $title = array("Forrest Gump","The Green Mile","Shutter Island","The Shining","Parasite","Gladiator","Se7en","The Dark Knight","Drive","Pulp Fiction");
                    echo"<table>";
                    echo"<tbody>";
                    echo "<tr>";
                    $i=0;
                    foreach ($title as &$film) {                   
                      if ($i%5==0 && $i!=0) {
                        echo "</tr><tr>";
                      } 
                      $film = str_replace ( ' ', '+', $film);                    
                      if( $_GET['style']=='alternatif') {                 
                        echo "<td class='square'><a href='action.php?style=alternatif&t=".$film."#film'><img class='square' src=".getPosterTitle($film)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      else{
                        echo "<td class='square'><a href='action.php?t=".$film."#film'><img class='square' src=".getPosterTitle($film)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      $i++;
                    }
                    echo "</tr>"; 
                    echo"</tbody>";
                    echo"</table>";                   
                 }                                                                           
                ?>

                <?php  
                  function albumSeries(){
                    $title = array("Game of Thrones","Breaking Bad","Peaky Blinders","The Queen’s Gambit","Stranger Things","Vikings","Narcos","The Walking Dead","Brooklyn Nine-Nine","You");
                    echo"<table>";
                    echo"<tbody>";
                    echo "<tr>";
                    $i=0;
                    foreach ($title as &$serie) {                   
                      if ($i%5==0 && $i!=0) {
                        echo "</tr><tr>";
                      } 
                      $serie = str_replace ( ' ', '+', $serie);                    
                      if( $_GET['style']=='alternatif') {                 
                        echo "<td class='square'><a href='action.php?style=alternatif&t=".$serie."#film'><img class='square' src=".getPosterTitle($serie)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      else{
                        echo "<td class='square'><a href='action.php?t=".$serie."#film'><img class='square' src=".getPosterTitle($serie)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      $i++;
                    }
                    echo "</tr>"; 
                    echo"</tbody>";
                    echo"</table>";                   
                 }                                                                           
                ?>

                <?php  
                  function albumAnimes(){
                    $title = array("Hunter x Hunter","One Piece","Attack on Titan","JoJo's Bizarre Adventure","Code Geass","Naruto Shippuden","Fullmetal Alchemist : Brotherhood","Jujutsu Kaisen","Erased","Cowboy Bebop");
                    echo"<table>";
                    echo"<tbody>";
                    echo "<tr>";
                    $i=0;
                    foreach ($title as &$serie) {                   
                      if ($i%5==0 && $i!=0) {
                        echo "</tr><tr>";
                      } 
                      $serie = str_replace ( ' ', '+', $serie);  
                      $serie = str_replace ( "'", '%27', $serie);                   
                      if( $_GET['style']=='alternatif') {                 
                        echo "<td class='square'><a href='action.php?style=alternatif&t=".$serie."#film'><img class='square' src=".getPosterTitle($serie)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      else{
                        echo "<td class='square'><a href='action.php?t=".$serie."#film'><img class='square' src=".getPosterTitle($serie)." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                      }
                      $i++;
                    }
                    echo "</tr>"; 
                    echo"</tbody>";
                    echo"</table>";                   
                 }                                                                           
                ?>

                <?php  

                        function series($dir){
                           $liste = array();
                           $filename = $dir;
                           $total = count(file($filename));
                           $handle = fopen($filename, "r");
                           $line = fgets($handle);
                           $i = 0;
                           while ($i <= ($total-2)) {
                              $line = fgets($handle);
                              $seperator = explode(",", (string)$line);
                              $liste[$i] = $seperator[0];
                              $i++;
                           }
                           $count = 0;
                           foreach ($liste as $i) {
                              $count ++;
                           }
                           $num = rand (0, ($count-1));
                           return $liste[$num];
                        }  
                                                                         
                ?>

                <?php  

                  function randomSerie($id){
                  $api_key = '1495fa1f';
                  $imdb_series_id = $id;
                  if(empty($api_key)){
                     echo 'Get API key from http://www.omdbapi.com/';
                     die();
                  }
                  $data = json_decode(file_get_contents('http://www.omdbapi.com/?i='.$imdb_series_id.'&plot=full&apikey='.$api_key.''), true);
                  //Remove the below comment to see all possible data
                  //print_r($data);
                  echo '
                  <img src="'.$data['Poster'].'"/>
                  <hr/>
                  Title: <strong>'.$data['Title'].'</strong><br/>
                  Year: '.$data['Year'].'<br/>
                  Genre: '.$data['Genre'].'<br/>
                  Actors : '.$data['Actors'].'<br/>
                  Plot: '.$data['Plot'].'<br/>
                  IMDB Rating: <strong>'.$data['imdbRating'].'</strong> / 10 ('.$data['imdbVotes'].')<br/>';
               }  
                                                                         
                ?>

                <?php  
                        function randomAnime($dir){
                           $liste = array();
                           $filename = $dir;
                           $total = count(file($filename));
                           $handle = fopen($filename, "r");
                           $line = fgets($handle);
                           $i = 0;
                           while ($i <= ($total-2)) {
                              $line = fgets($handle);                       
                              $liste[$i] = $line;
                              $i++;
                           }
                           $count = 0;
                           foreach ($liste as $i) {
                              $count ++;
                           }
                           $num = rand (0, ($count-1));
                           return $liste[$num];
                        }                                                                          
                ?>

                <?php
                  function search($title, $type){
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?s='.$title.'&type='.$type.'&plot=full&page=1&apikey='.$api_key.''), true);
                    //Remove the below comment to see all possible data
                    //print_r($data);

                    $i=0;
                    $suite = $data['Search'];
                    $sous_suite = $suite[$i];
                    //echo $sous_suite['Title'];
                    if (!is_null($sous_suite['Title'])) {
                      while ($i < 10) {
                        $suite = $data['Search'];
                        $sous_suite = $suite[$i];
                        if (is_null($sous_suite['Title'])) {
                          break;
                        }
                        echo '<section><h2>'.$sous_suite['Title'].'</h2>';                       
                        filmByTitle($sous_suite['Title']);
                        echo '</section>';
                        $i++;
                      }  
                    } 
                    else{
                      echo "<section><h2>Votre sélection</h2>Malheureusement, La recherche n'a retourné aucun résultat.</section>";
                    }           
                  }                 
                ?>

                <?php
                  function searchSeries($title){
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$title.'&type=series&plot=full&apikey='.$api_key.''), true);

                    //Remove the below comment to see all possible data
                    //print_r($data);
                     if (!is_null($data['Title'])) {
                      listeDeroulante($data['totalSeasons'],"saison");
                      echo '<br>';
                      filmByTitle($title);  
                    }
                    else{
                      echo "Malheureusement, La recherche n'a retourné aucun résultat.";
                    }
                  }                                 
                ?>

                <?php
                  function searchSeasons($title, $num){
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$title.'&Season='.$num.'&type=series&plot=full&apikey='.$api_key.''), true);
 
                    //Remove the below comment to see all possible data
                    //print_r($data);

                    $var=0;
                    $suite = $data['Episodes'];
                    $sous_suite = $suite[$var];
                      while (!is_null($sous_suite['imdbID'])) {
                        $suite = $data['Episodes'];
                        $sous_suite = $suite[$var];
                        if (is_null($sous_suite['imdbID'])) {
                          break;
                        }
                        $var++;
                      }                     

                    echo '<section><h2>'.$data['Title'].' - Saison '.$num.'</h2>';
                    listeDeroulante($var, "episode"); 
                    echo '<br>';                      
                    filmByTitle($title);
                    echo '</section>';
                   
                    $i=0;
                    $suite = $data['Episodes'];
                    $sous_suite = $suite[$i];
                    //echo $sous_suite['Title'];

                      while (!is_null($sous_suite['imdbID'])) {
                        $suite = $data['Episodes'];
                        $sous_suite = $suite[$i];
                        if (is_null($sous_suite['imdbID'])) {
                          break;
                        }
                        echo '<section><h2>Episode '.$sous_suite['Episode'].' - '.$sous_suite['Title']."</h2>\n\t\t\t";                       
                        filmById($sous_suite['imdbID']);
                        echo '</section>';
                        $i++;
                      }                     
                  }                                 
                ?>

                <?php
                  function searchEpisodes($title, $num, $ep){
                    $keep = $title;
                    $api_key = '1495fa1f';
                    $title = str_replace ( ' ', '+', $title);
                    if(empty($api_key)){
                      echo 'Get API key from http://www.omdbapi.com/';
                      die();
                    }
                    $data = json_decode(file_get_contents('http://www.omdbapi.com/?t='.$title.'&Season='.$num.'&Episode='.$ep.'&type=series&plot=full&apikey='.$api_key.''), true);
 
                    //Remove the below comment to see all possible data
                    //print_r($data);
           
                    echo '<section><h2>'.$keep.' - Saison '.$data['Season'].' - Episode '.$data['Episode'].' : '.$data['Title']."</h2>\n\t\t\t";
                    echo '<br>';                      
                    filmById($data['imdbID']);
                    echo '</section>';                     
                  }                                 
                ?>

                <?php
                     function listeDeroulante($num, $name){
                              if( $_GET['style']=='alternatif') {
                                echo' <form action="action.php?style=alternatif" method="get">';
                              }
                              else{
                                echo' <form action="action.php" method="get">';
                              }
                              echo'<fieldset>';
                              echo'<legend>Nombre de '.$name.' : <strong>'.$num.'</strong></legend>';
                              echo "<select name='".$name."'>";
                              $i=1;
                              while ($i <= $num){
                                 echo "<option value='".$i."'>".$name." ".$i."</option>\n\t\t\t";
                                 $i++;
                              } 
                              echo '</select>
                              <input type="submit" value="search"/></a>
                              </fieldset>
                              </form>';                                             
                     }   
                ?> 

                <?php
                  function last_series(){
                    $serie = fopen('last_serie.txt', 'c+');
                    $check = fgets($serie);
                     
                    if($_GET["serie"] != $check)
                    {
                        fclose($serie);
                       
                        $serie = fopen('last_serie.txt', 'w+');
                       
                        fputs($serie, $_GET["serie"]);
                    }
                    fclose($serie);
                  }                 
                ?>

                <?php
                  function last_saison(){
                    $saison = fopen('last_saison.txt', 'c+');
                    $check = fgets($saison);
                     
                    if($_GET["saison"] != $check)
                    {
                        fclose($saison);
                       
                        $saison = fopen('last_saison.txt', 'w+');
                       
                        fputs($saison, $_GET["saison"]);
                    }
                    fclose($saison);
                  }                 
                ?>

                <?php
                  function stats($dir){
                    $visits = array();
                    $visits_save = array();              
                    $filename = $dir;
                    $total = count(file($filename));
                    $handle = fopen($filename, "r");
                    $line = fgets($handle);
                    $count=0;
                    $i = 0;
                    while ($i <= ($total-2)) {
                       $line = fgets($handle);
                       $seperator = explode(",", (string)$line);
                       //$id[$i] = $seperator[0];
                       $visits[$i] = $seperator[1];
                       $i++;
                       $count++;
                    }
                    $i = 0;
                    while ($i <= $count) {
                      $visits_save[$i]=$visits[$i];
                      $i++;
                    }
                    rsort($visits, SORT_NUMERIC);
                    rsort($visits_save, SORT_NUMERIC);
                    $visits=array_unique($visits); 
                    $count=0; 
                    foreach ($visits as $i ) {
                      $count++;
                    }                 
                    //echo $visits[1];
                    $id = array();                    
                    $j=0; 
                    //print_r($visits);
                    foreach ($visits as $key) {
                       $filename = $dir;
                       $total = count(file($filename));
                       $handle = fopen($filename, "r");
                       $line = fgets($handle); 
                       $ligne=0;           
                        while ($ligne <= ($total-2)) {
                         $line = fgets($handle);
                         $seperator = explode(",", (string)$line);
                         if ($seperator[1]==$key) {
                            $id[$j] = $seperator[0];
                            $j++;
                         }                         
                         $ligne++;
                      }                     
                    }
                    
                    echo "<section>
                            <h2 id = 'barres'>Diagramme à barres</h2>
                              <figure>
                                <figcaption class='spechart'><strong>Les 10 films les plus populaires du site</strong></figcaption>
                                <svg class='chart' width='700' height='220' role='img'>";
                    $i = 0;
                    while ($i <= 9) {
                      $api_key = '1495fa1f';
                      $imdb_movie_id = $id[$i];
                      $data = json_decode(file_get_contents('http://www.omdbapi.com/?i='.$imdb_movie_id.'&plot=full&apikey='.$api_key.''), true);
                      $rec=20*$i+10;
                      $abs=$visits_save[$i]+5;
                      $ord=8+(20*$i)+10;
                       echo '<g class="bar">
                              <rect width="'.$visits_save[$i].'" height="19" y="'.$rec.'"></rect>
                              <text class="spechart" x="'.$abs.'" y="'.$ord.'" dy=".35em">'.$visits_save[$i].' '.$data['Title'].'</text>                              
                            </g>';
                      $i++;
                    }
                    echo "</svg>
                          </figure>                                
                          </section>";

                    $i = 0;
                    while ($i <= 9) {
                       $j=$i+1;
                       if ($i==0) {
                         echo '<section><h2 id="liste">'.$j.'. Visité '.$visits_save[$i].' fois</h2>';
                       }
                       else{
                        echo '<section><h2>'.$j.'. Visité '.$visits_save[$i].' fois</h2>';
                       }
                       filmById($id[$i]);
                       echo '</section>';
                       $i++;
                    }
                  }                 
                ?>

                <?php
                  function add_stats($id){
                    $is_done = 0;
                    $filename="stats.csv"; 
                    $file = file($filename); 
                    $total = count(file($filename));
                    $handle = fopen($filename, "r");

                    $i=1;
                    while ($i <= ($total)) {                     
                       $line = fgets($handle);
                       $seperator = explode(",", (string)$line);
                       if($seperator[0]==$id){
                        $num = (int)$seperator[1];
                        $num++;
                        $var=$i-1;
                        unset($file[$var]); 
                        file_put_contents($filename, $file);
                        if ($i==$total) {
                           $new =''.$id.','.$num.'';
                        }
                        else{
                          $new = "\r\n".''.$id.','.$num.'';
                        }
                        file_put_contents('stats.csv', (string)$new, FILE_APPEND);
                        $is_done = 1;
                       }
                       $i++;
                    } 
                    if ($is_done == 0) {
                      $new = "\r\n".''.$id.',1';
                      file_put_contents('stats.csv', (string)$new, FILE_APPEND);
                    }                          
                  }        
                ?>  

                <?php 
                  function addFilm($id){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename=''.$user_ip.'.txt';
                    //$new=''.$id.''."\r\n";
                    
                    $is_done = 0;                    

                    if (file_exists($filename)) {
                      $file = file($filename);
                      $total = count(file($filename));
                      $handle = fopen($filename, "r");

                      $i=0;
                      while ($i <= ($total-1)) {                     
                         $line = fgets($handle);
                         $seperator = explode(",", (string)$line);
                         if($seperator[0]==$id){
                          unset($file[$i]); 
                          file_put_contents($filename, $file);
                          $new=''.$id.','."\r\n";
                          file_put_contents($filename, (string)$new, FILE_APPEND);
                          $is_done = 1;
                         }
                         $i++;
                      } 
                    }
                    if ($is_done == 0) {
                      $new=''.$id.','."\r\n";
                      file_put_contents($filename, (string)$new, FILE_APPEND);
                    }                   
                  }
                ?> 

                <?php
                     function watchList($id){
                        $exist=existInList($id);
                        if( $_GET['style']=='alternatif') {
                          if($exist==0){
                            echo' <a href="watchList.php?add='.$id.'"><img src=image/add.png height="50" width="50" alt="add"/></a>';
                          }
                          else{
                            echo' <a href="watchList.php?supp='.$id.'"><img src=image/delete.png height="50" width="50" alt="supp" /></a>';
                          }                          
                        }
                        else{
                          if($exist==0){
                            echo' <a href="watchList.php?add='.$id.'"><img src=image/add.png height="50" width="50" alt="add"/></a>';
                          }
                          else{
                            echo' <a href="watchList.php?supp='.$id.'"><img src=image/delete.png height="50" width="50" alt="supp"/></a>';
                          }
                        }                                             
                     }   
                ?> 

                <?php 
                  function displayList(){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename=''.$user_ip.'.txt';     
                     
                    if (file_exists($filename)) {
                      $file = file($filename);
                      $total = count(file($filename));
                      $handle = fopen($filename, "r");

                      $i=0;
                        while ($i < ($total)) {
                        $line = fgets($handle);
                        $seperator = explode(",", (string)$line);
                        $title = getTitleById($seperator[0]);

                        if (strlen($line)==0 && $total==1) {
                          echo '<section><h2 id="list">Votre Liste</h2>';
                          echo "<p>Malheureusement votre WatchList est vide pour le moment. Pour y ajouter des films, presser le bouton +</p>";
                          echo '</section>';
                        }
                        else if ($i==0) {
                           echo '<section><h2 id="list">'.$title.'</h2>';
                           filmById($seperator[0]);
                           echo '</section>';
                         }
                         else{
                          echo '<section><h2>'.$title.'</h2>';
                          filmById($seperator[0]);
                          echo '</section>';
                         }                      
                         $i++;
                      }
                    } 
                    else{
                      echo '<section><h2 id="list">Votre Liste</h2>';
                      echo "<p>Malheureusement votre WatchList est vide pour le moment. Pour y ajouter des films, presser le bouton +</p>";
                      echo '</section>';
                    }                                                                           
                  }
                ?> 

                <?php 
                  function existInList($id){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename=''.$user_ip.'.txt';     
                    $is_exist=0;

                    if (file_exists($filename)) {
                      $file = file($filename);
                      $total = count(file($filename));
                      $handle = fopen($filename, "r");

                      $i=0;
                        while ($i < ($total)) {
                        $line = fgets($handle);
                        $seperator = explode(",", (string)$line);

                        if ($seperator[0]==$id) {
                           $is_exist=1;
                         }                    
                         $i++;
                      }
                    }
                    return $is_exist;                                                                          
                  }
                ?>  

                <?php 
                  function suppFilm($id){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename=''.$user_ip.'.txt';     

                    if (file_exists($filename)) {
                      $file = file($filename);
                      $total = count(file($filename));
                      $handle = fopen($filename, "r");

                      $i=0;
                        while ($i < ($total)) {
                        $line = fgets($handle);
                        $seperator = explode(",", (string)$line);

                        if ($seperator[0]==$id) {
                          unset($file[$i]); 
                          file_put_contents($filename, $file);
                        }                    
                         $i++;
                      }
                    }
                  }
                ?>   

                <?php 
                  function isEmptyList(){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename=''.$user_ip.'.txt';     
                    $is_empty=0;

                    if (file_exists($filename)) {
                      $file = file($filename);
                      $total = count(file($filename));
                      $handle = fopen($filename, "r");
                      $line = fgets($handle);
                      return (strlen($line)==0);
                    } 
                    else{
                      return 0;  
                    }                                                                      
                  }
                ?>  

                <?php
                  function change_mode($change){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename =''.$user_ip.'last_mode.txt'; 
                    $file = file($filename);
                    $total = count(file($filename));
                    $handle = fopen($filename, "r");
                    $line = fgets($handle);
                    if ($line="light") {
                      file_put_contents($filename, "dark");
                    }
                    else{
                      file_put_contents($filename, "light");
                    }                    
                  }                 
                ?>  

                <?php
                  function get_mode(){
                    $user_ip = getenv('REMOTE_ADDR');
                    $filename =''.$user_ip.'last_mode.txt'; 

                    if (!file_exists($filename)) {
                        file_put_contents($filename, "light");
                    } 
                    return file_get_contents($filename);
                  }                 
                ?>                  