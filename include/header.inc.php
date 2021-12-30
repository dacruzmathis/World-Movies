<?php
session_start();
$success = 0;
$themefinal = 0;

if (isset($_GET['theme'])){
    $theme = htmlspecialchars($_GET['theme']);
    if ($theme == 'dark'){
        $success = 1;
        setcookie('theme', 'jour', time() + 365*24*3600, null, null, false, true);
    }
    if ($theme == 'light'){
        $success = 1;
        setcookie('theme', 'sombre', time() + 365*24*3600, null, null, false, true);
    }
}
if ($_COOKIE['theme'] == 'dark'){
        $success = 1;
        $themefinal = 'dark';
    }
    elseif ($_COOKIE['theme'] == 'light'){
        $success = 1;
        $themefinal = 'light';
    } else {
        $success = 1;
        $themefinal = "light";
    }
//$res = array("success" => $success, "final" => $themefinal);
//echo json_encode($res);

?>
<?php
 
    $ip = fopen('last_ip.txt', 'c+');
    $check = fgets($ip);
     
    $file = fopen('counter.txt', 'c+');
    $count = intval(fgets($file));
     
    if($_SERVER['REMOTE_ADDR'] != $check)
    {
        fclose($ip);
       
        $ip = fopen('last_ip.txt', 'w+');
       
        fputs($ip, $_SERVER['REMOTE_ADDR']);
       
        $count++;
        fseek($file, 0);
        fputs($file, $count);
    }
     
    fclose($file);
    fclose($ip);
?>
<?php
/**
*initialise la zone header
*@param numero du td
*/
	function initheader($arg) {
		echo'	<!DOCTYPE html>
		<html lang="en">
		<head>
		<title>World Movies - Films et Séries</title>
		<link rel="icon" type="image/png" href="image/logo.png" />
		<meta charset="utf-8"/>
		<meta name="author" content="Saidou/Mathis"/>
		<meta name="date" content="2021-04-02T12/01/36+0100"/>
		<meta name="keywords" content="Films, Movies, Series"/>
		<meta name="description" content=""/>
		<meta name="viewport" content=""/>';

		if (empty($_GET['style'])) {
			echo '<link rel="stylesheet" href="style.css"/> ';
		}
			
			
		if (isset($_GET['style'])) {

			if( $_GET['style']=='alternatif') {
				echo '<link rel="stylesheet" href="alternatif.css"/> 	'	;	
			}
		
			else {	
				echo '<link rel="stylesheet" href="style.css"/> ';
			}
		}
		
			echo'
		<style>
		     .tr{display: inline;}
		     .red{background-color: white; color:red;font-size: 15pt;}
		     .green{background-color: white; color:green;font-size: 15pt;}
		     .blue{background-color: white; color:blue;font-size: 15pt;}
		</style>
	</head>
	<body>
		<!-- Header -->
		<header id="haut">
		<nav class="navbar">';

					if( $_GET['style']=='alternatif') {
						echo'<a href="index.php?style=alternatif"><img src="image/home.png" height="18" width="18" alt="home"/></a>					
						<a href="films.php?style=alternatif">Films</a>
						<a href="series.php?style=alternatif">Séries</a>
						<a href="animes.php?style=alternatif">Animés</a>
						<a href="panorama.php?style=alternatif">Panorama</a>
						<a href="statistiques.php?style=alternatif">Statistiques</a>
						<a href="watchList.php?style=alternatif">WatchList</a>
						<a href="upcoming.php?style=alternatif">Upcoming Movies</a>
						<a style= "margin-left: 400px;" href="'.$arg.'.php">Jour</a>
						<a href="'.$arg.'.php?style=alternatif">Nuit</a>';
					}

					else{
						echo'<a href="index.php"><img src="image/home2.png" height="18" width="18" alt="home"/></a>									
						<a href="films.php">Films</a>
						<a href="series.php">Séries</a>
						<a href="animes.php">Animés</a>
						<a href="panorama.php">Panorama</a>
						<a href="statistiques.php">Statistiques</a>
						<a href="watchList.php">WatchList</a>
						<a href="upcoming.php">Upcoming Movies</a>
						<a style= "margin-left: 400px;" href="'.$arg.'.php">Jour</a>
						<a href="'.$arg.'.php?style=alternatif">Nuit</a>';
					}
						
				echo'</nav>

			<h1> World Movies </h1>';
			
                	if( $_GET['style']=='alternatif') {
                		echo' <form action="action.php?style=alternatif" method="get">';
                	}
                	else{
                		echo' <form action="action.php" method="get">';
                	}
                    
                    echo'
                    <fieldset>
                    <legend>Recherche ciblée</legend> 
                    <input type="text" name="t" size="50" placeholder="Recherche par Titre"/>   
                    <input type="text" name="y" size="15" placeholder="Année (optionnel)"/>
					<input type="submit" value="search"/>						                    
                </fieldset>
            </form>';

            		if( $_GET['style']=='alternatif') {
                		echo' <form action="action.php?style=alternatif" method="get">';
                	}
                	else{
                		echo' <form action="action.php" method="get">';
                	}
                    
                    echo'
                    <fieldset>
                    <legend>Recherche multiple</legend> 
                    <input type="text" name="s" size="50" placeholder="Recherche par Titre"/>   
                    <label for="type">Type : </label>
					<input type="radio" name="type" id="type" value="movie" checked /> Movie
					<input type="radio" name="type" value="series" /> Série
					<input type="submit" value="search"/>						                    
                </fieldset>
            </form>';

            		if( $_GET['style']=='alternatif') {
                		echo' <form action="action.php?style=alternatif" method="get">';
                	}
                	else{
                		echo' <form action="action.php" method="get">';
                	}
                    
                    echo'
                    <fieldset>
                    <legend>Rechercher séries, saisons, episodes</legend> 
                    <input type="text" name="serie" size="50" placeholder="Recherche par Titre de Série"/>   
					<input type="submit" value="search"/>						                    
                </fieldset>
            </form>
		</header>';
	}
?>