<?php
    include('include/header.inc.php');
    initheader("upcoming");
    include "conf/info.php";
    include('include/util.inc.php');
    include('include/fonctions.inc.php');
    
?>
    <!-- Aside -->
    <aside >
      <nav class="sidenav"> 
        <p class="bigger"><strong>World Movie</strong></p>
          <a href="#film"> Upcoming Movies</a>
          <?php 
            geoPlugin(); 
          ?>
      </nav>
    </aside>

    <main>
        <section>
          <h2 id="film">Films à venir</h2>
          <?php     
            include_once "api/api_upcoming.php";     
                      echo"<table>";
                      echo"<tbody>";
                      echo "<tr>";   
                      $i=0;
                      foreach($upcoming->results as $film){
                        $title=$film->original_title;
                        if ($i%5==0 && $i!=0) {
                          echo "</tr><tr>";
                        } 
                        $title = str_replace ( ' ', '+', $title);                    
                        if( $_GET['style']=='alternatif') {                 
                          echo "<td class='square'><a href='movie.php?style=alternatif&id=".$film->id."#film'><img class='square' src=".$imgurl_1."". $film->poster_path ." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                        }
                        else{
                          echo "<td class='square'><a href='movie.php?id=".$film->id."#film'><img class='square' src=".$imgurl_1."". $film->poster_path ." style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                        }
                        $i++;
                      }                     
                      echo "</tr>"; 
                      echo"</tbody>";
                      echo"</table>";       
          ?>
        </section>
</main>
    <?php
      include('include/footer.inc.php');
    ?>