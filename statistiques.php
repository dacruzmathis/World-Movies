<!--include-->
<?php
      include('include/header.inc.php');
      initheader("statistiques");
      include('include/util.inc.php');
      include('include/fonctions.inc.php');

?>
      <!--SideBar-->
      <aside>
         <!--StyleLocale/Externe-->
         <nav class="sidenav" style="height: 100%; width: 225px; position: fixed; z-index: 1; top: 0; left: 0; background-color: #111; overflow-x: hidden; padding-top: 20px;"> 
            <p class="bigger"><strong>Sommaire</strong></p>
            <a href="#barres">Diagramme à barres</a>
            <a href="#liste">Top 10 des films les plus consultés</a> 
            <?php 
               geoPlugin(); 
            ?>           
         </nav>
      </aside>
      <!--Exos-->
         <main>         
            <?php 
               stats("stats.csv");
            ?>
         </main>
         <!--footer-->
      <?php 
         include 'include/footer.inc.php';
      ?>
