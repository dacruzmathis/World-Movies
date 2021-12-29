<?php
    include('include/header.inc.php');
    initheader("movie");
    include "conf/info.php";
    include('include/util.inc.php');
    include('include/fonctions.inc.php');

  include "conf/info.php";
  
  $id_movie = $_GET['id'];
    include_once "api/api_movie_id.php";
    include_once "api/api_movie_video_id.php";
    include_once "api/api_movie_similar.php";
    $title = "Detail Movie (".$movie_id->original_title.")";
  
?>

    <!-- Aside -->
    <aside >
      <nav class="sidenav"> 
        <p class="bigger"><strong>World Movie</strong></p>
        <a href="#film"><?php echo $movie_id->original_title; ?></a>
        <a href="#sim">Films Similaires</a>
          <?php 
            geoPlugin(); 
          ?>
      </nav>
    </aside>
<main>
    <section id="film">
    <?php 
    if(isset($_GET['id'])){
    $id_movie = $_GET['id']; 
    ?>
    <h2><?php echo $movie_id->original_title ?></h2>

    <?php 
      $i=0;
      foreach($movie_video_id->results as $video){
                    if ($i==0) {
                      echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video->key.'" frameborder="0" allowfullscreen></iframe><br/>';
                    }
                    $i++;
      }
     ?>
         <?php echo'<img src="'.$imgurl_2.''.$movie_id->poster_path.'" alt="img"/>';?>
         <hr/>
          <p> Title: <strong><?php echo $movie_id->original_title ?></strong> <br/>
              Year: <?php $rel = date('Y', strtotime($movie_id->release_date)); echo $rel ?> <br/>
              Genre: 
              <?php
                foreach($movie_id->genres as $g){
                  echo '<span>' . $g->name . '</span> ';
                }
              ?> <br/>
              Plot: <?php echo $movie_id->overview ?> <br/> 
              Runtime: <?php echo $movie_id->runtime ?> min <br/>            
              TMDB Rating: <strong><?php echo $movie_id->vote_average ?></strong> /10 (<?php echo $movie_id->vote_count ?>)</p>

  </section>
    <section>
        <h2 id="sim">Similar Movies</h2>
            <?php
              echo"<table>";
              echo"<tbody>";
              echo "<tr>"; 
              $i = 0;
              foreach($movie_similar_id->results as $film){
                if ($i<9) {
                  if ($i%3==0 && $i!=0) {
                    echo "</tr><tr>";
                  } 
                  if( $_GET['style']=='alternatif') {
                    echo "<td class='square2'><a href='movie.php?style=alternatif&id=".$film->id."#film'><img class='square2' src='http://image.tmdb.org/t/p/w300".$film->backdrop_path."' style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                  }
                  else{
                    echo "<td class='square2'><a href='movie.php?id=".$film->id."#film'><img class='square2' src='http://image.tmdb.org/t/p/w300".$film->backdrop_path."' style= 'border: 0;' alt='poster'/></a></td>\n\t\t\t";
                  }
                }              
                $i++;
              }
              echo "</tr>"; 
              echo"</tbody>";
              echo"</table>"; 
              if ($i==0) {
                echo "<p>Malheureusement, Il n'y a aucun film similaire.</p>";
              }
            ?>

          <?php 
          } else{
            echo "<section><h2>Votre selection</h2><p>Malheureusement, La recherche n'a retourné aucun résultat.</p><section>";
          }
          ?>
    </section>

</main>

 <?php
      include('include/footer.inc.php');
    ?>