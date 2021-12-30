<?php
function displayDate($lang) {
    $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
  $day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");                          
  $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
  $month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); 
    if($lang == "fr") {
        echo "<p>".$jour[date("N")-1] . " " . date("d") . " " . $mois[date("n")-1] . " " . date('Y')." " . date("H:i")."</p>";
    }
    else if($lang == "en") {
        echo "<p>".$day[date('N')-1] . ", " . $month[date("n")-1] . " " .date("d") . ", " . date("Y")." " . date("g:i a")."</p>";
    }
    else {
        echo "language unavailable";
    }
}

function clientBrowser() {
    
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
    $browser = 'Unknown';

      if(preg_match('/MSIE/i',$user_agent) && !preg_match('/Opera/i',$user_agent)) { 
         $browser = 'Internet Explorer'; 
      } elseif(preg_match('/Firefox/i',$user_agent)) { 
          $browser = 'Mozilla Firefox'; 
      } elseif(preg_match('/Chrome/i',$user_agent)) { 
          $browser = 'Google Chrome';  
      }elseif(preg_match('/Safari/i',$user_agent)) { 
          $browser = 'Apple Safari';
      } elseif(preg_match('/Opera/i',$user_agent)) { 
          $browser = 'Opera'; 
      } elseif(preg_match('/Netscape/i',$user_agent)) { 
          $browser = 'Netscape'; 
      } 
      
    return $browser;
  }
	
function afficheMois ($month,$year) {
 /**
 *affichage du calendrier
 *@param $mois est le numero du mois
 *@param $annee est le numero de l'annee
 **/
 
 		$month_name = array(1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	 	$days = array(1 => 'lu', 'ma', 'me', 'je', 've', 'sa', 'di');
 	
 		echo'<table class="cal"  >';
 		echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$month].' '.$year.'</td></tr>';
 		echo'<tr>';
 		for($i=1;$i<8;$i++){
			echo '<th>'.$days[$i].'</th>'; 
		
	 	}
 		echo'</tr>';
 		
 		// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 		if ($year == date('Y') && $month == date('m')){
   	 	$today = date('d');
    	}
 	 	else{
   		 $today = 0;
   	}
 		$time = mktime(0,0,0,$month,1,$year); // timestamp du 1er du mois demand�
 		$days_in_month = date('t',$time);     // nombre de jours dans le mois		
		$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
  		if ($firstday == 0){
  		 	$firstday = 7;    // attention, en php, dimanche = 0
		}
   	
   	$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
  		 echo '<tr>'; 
  		 // on met des cases blanches jusqu au 1 er jours:
 		 for ( ; $daycode<$firstday; $daycode++) {
 		 	echo '<td>&apos;</td>';
 		}
 		// boucle pour ecrire les numero de tous les jours du mois :
 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    	// si  lundi (sauf le 1er), 
   	 // on ferme la ligne p et on en ouvre une nouvelle 
   		 if ($daycode % 7 == 1 && $numday != 1) {
   		 	echo "</tr>\n".'<tr>';
   		 }
    			// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 echo $numday;
    		 echo '</td>';
    		
    		
    }
 	
	// on met des cases blanches pour completer la derni�re semaine si besoin :
 	 for ( ; $daycode%7 != 1; $daycode++) {
 	 	echo '<td>&apos;</td>';

  		
 	 }
 	 // on ferme la derniere ligne, et la table.
  		echo '</tr>'; echo "</table>";
 	
}	


function afficheCalendrier ($year,$format = 3) {
 /**
 *affichage du calendrier
 *@param $mois est le numero du mois
 *@param $annee est le numero de l'annee
 **/
 
 		$month_name = array(1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	 	$days = array(1 => 'lu', 'ma', 'me', 'je', 've', 'sa', 'di');
	 	//format 6*2
	 	if($format==6) {
	 		
 		for($i=1;$i<7;$i++) {
 				
 				echo'<table class="cal" style="display:inline; ">';
 		
 				echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$i].' '.$year.'</td></tr>';
 				echo'<tr>';
 				for($j=1;$j<8;$j++){
					echo '<th>'.$days[$j].'</th>'; 
		
			 	}
 				echo'</tr>';
 		
 				// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 				if ($year == date('Y') && $month_name == date('m')){
   	 			$today = date('d');
    			}
 	 			else{
   		 		$today = 0;
   			}
		 		$time = mktime(0,0,0,$i,1,$year); // timestamp du 1er du mois demand�
 				$days_in_month = date('t',$time);     // nombre de jours dans le mois		
				$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
		  		if ($firstday == 0){
  				 	$firstday = 7;    // attention, en php, dimanche = 0
				}
   	
   			$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
 		 		 echo '<tr>'; 
  				 // on met des cases blanches jusqu au 1 er jours:
 		 		for ( ; $daycode<$firstday; $daycode++) {
		 		 	echo '<td>&apos;</td>';
 				}
 				// boucle pour ecrire les numero de tous les jours du mois :
		 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    			// si  lundi (sauf le 1er), 
   	 		// on ferme la ligne p et on en ouvre une nouvelle 
   		 		if ($daycode % 7 == 1 && $numday != 1) {
   		 			echo "</tr>\n".'<tr>';
   		 		}
    					// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			 		echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 		echo $numday;
    		 		echo '</td>';
    		
    		
 		   }
 	
			// on met des cases blanches pour completer la derni�re semaine si besoin :
		 	 for ( ; $daycode%7 != 1; $daycode++) {
		 	 	echo '<td>&apos;</td>';

  		
 	 		}
		 	 // on ferme la derniere ligne, et la table.
  			echo '</tr>'; 
  			echo "</table>";
  			
  		}
  		echo'<br>';
  		for($i=7;$i<13;$i++) {
 				
 				echo'<table class="cal" style="display:inline; ">';
 		
 				echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$i].' '.$year.'</td></tr>';
 				echo'<tr>';
 				for($j=1;$j<8;$j++){
					echo '<th>'.$days[$j].'</th>'; 
		
			 	}
 				echo'</tr>';
 		
 				// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 				if ($year == date('Y') && $month_name == date('m')){
   	 			$today = date('d');
    			}
 	 			else{
   		 		$today = 0;
   			}
		 		$time = mktime(0,0,0,$i,1,$year); // timestamp du 1er du mois demand�
 				$days_in_month = date('t',$time);     // nombre de jours dans le mois		
				$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
		  		if ($firstday == 0){
  				 	$firstday = 7;    // attention, en php, dimanche = 0
				}
   	
   			$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
 		 		 echo '<tr>'; 
  				 // on met des cases blanches jusqu au 1 er jours:
 		 		for ( ; $daycode<$firstday; $daycode++) {
		 		 	echo '<td>&apos;</td>';
 				}
 				// boucle pour ecrire les numero de tous les jours du mois :
		 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    			// si  lundi (sauf le 1er), 
   	 		// on ferme la ligne p et on en ouvre une nouvelle 
   		 		if ($daycode % 7 == 1 && $numday != 1) {
   		 			echo "</tr>\n".'<tr>';
   		 		}
    					// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			 		echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 		echo $numday;
    		 		echo '</td>';
    		
    		
 		   }
 	
			// on met des cases blanches pour completer la derni�re semaine si besoin :
		 	 for ( ; $daycode%7 != 1; $daycode++) {
		 	 	echo '<td>&apos;</td>';

  		
 	 		}
		 	 // on ferme la derniere ligne, et la table.
  			echo '</tr>'; 
  			echo "</table>";
  			
  		}
  			echo'<br>';
  	}
  
  	//format 3*4
  	else if($format==3) {
  		
  		for($i=1;$i<5;$i++) {
 				
 				echo'<table class="cal" style="display:inline; ">';
 		
 				echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$i].' '.$year.'</td></tr>';
 				echo'<tr>';
 				for($j=1;$j<8;$j++){
					echo '<th>'.$days[$j].'</th>'; 
		
			 	}
 				echo'</tr>';
 		
 				// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 				if ($year == date('Y') && $month_name == date('m')){
   	 			$today = date('d');
    			}
 	 			else{
   		 		$today = 0;
   			}
		 		$time = mktime(0,0,0,$i,1,$year); // timestamp du 1er du mois demand�
 				$days_in_month = date('t',$time);     // nombre de jours dans le mois		
				$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
		  		if ($firstday == 0){
  				 	$firstday = 7;    // attention, en php, dimanche = 0
				}
   	
   			$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
 		 		 echo '<tr>'; 
  				 // on met des cases blanches jusqu au 1 er jours:
 		 		for ( ; $daycode<$firstday; $daycode++) {
		 		 	echo '<td>&apos;</td>';
 				}
 				// boucle pour ecrire les numero de tous les jours du mois :
		 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    			// si  lundi (sauf le 1er), 
   	 		// on ferme la ligne p et on en ouvre une nouvelle 
   		 		if ($daycode % 7 == 1 && $numday != 1) {
   		 			echo "</tr>\n".'<tr>';
   		 		}
    					// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			 		echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 		echo $numday;
    		 		echo '</td>';
    		
    		
 		   }
 	
			// on met des cases blanches pour completer la derni�re semaine si besoin :
		 	 for ( ; $daycode%7 != 1; $daycode++) {
		 	 	echo '<td>&apos;</td>';

  		
 	 		}
		 	 // on ferme la derniere ligne, et la table.
  			echo '</tr>'; 
  			echo "</table>";
  			
  		}
  		echo'<br>';
  		for($i=5;$i<9;$i++) {
 				
 				echo'<table class="cal" style="display:inline; ">';
 		
 				echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$i].' '.$year.'</td></tr>';
 				echo'<tr>';
 				for($j=1;$j<8;$j++){
					echo '<th>'.$days[$j].'</th>'; 
		
			 	}
 				echo'</tr>';
 		
 				// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 				if ($year == date('Y') && $month_name == date('m')){
   	 			$today = date('d');
    			}
 	 			else{
   		 		$today = 0;
   			}
		 		$time = mktime(0,0,0,$i,1,$year); // timestamp du 1er du mois demand�
 				$days_in_month = date('t',$time);     // nombre de jours dans le mois		
				$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
		  		if ($firstday == 0){
  				 	$firstday = 7;    // attention, en php, dimanche = 0
				}
   	
   			$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
 		 		 echo '<tr>'; 
  				 // on met des cases blanches jusqu au 1 er jours:
 		 		for ( ; $daycode<$firstday; $daycode++) {
		 		 	echo '<td>&apos;</td>';
 				}
 				// boucle pour ecrire les numero de tous les jours du mois :
		 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    			// si  lundi (sauf le 1er), 
   	 		// on ferme la ligne p et on en ouvre une nouvelle 
   		 		if ($daycode % 7 == 1 && $numday != 1) {
   		 			echo "</tr>\n".'<tr>';
   		 		}
    					// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			 		echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 		echo $numday;
    		 		echo '</td>';
    		
    		
 		   }
 	
			// on met des cases blanches pour completer la derni�re semaine si besoin :
		 	 for ( ; $daycode%7 != 1; $daycode++) {
		 	 	echo '<td>&apos;</td>';

  		
 	 		}
		 	 // on ferme la derniere ligne, et la table.
  			echo '</tr>'; 
  			echo "</table>";
  			
  		}
  		echo'<br>';
  		for($i=9;$i<13;$i++) {
 				
 				echo'<table class="cal" style="display:inline; ">';
 		
 				echo'<tr><td colspan="7" class="cal_titre">'.$month_name[$i].' '.$year.'</td></tr>';
 				echo'<tr>';
 				for($j=1;$j<8;$j++){
					echo '<th>'.$days[$j].'</th>'; 
		
			 	}
 				echo'</tr>';
 		
 				// On regarde si aujourd'hui est dans ce mois pour mettre un style particulier
 				if ($year == date('Y') && $month_name == date('m')){
   	 			$today = date('d');
    			}
 	 			else{
   		 		$today = 0;
   			}
		 		$time = mktime(0,0,0,$i,1,$year); // timestamp du 1er du mois demand�
 				$days_in_month = date('t',$time);     // nombre de jours dans le mois		
				$firstday = date('w',$time);          // jour de la semaine du 1er du mois
  	
		  		if ($firstday == 0){
  				 	$firstday = 7;    // attention, en php, dimanche = 0
				}
   	
   			$daycode = 1; // ($daycode % 7) va nous indiquer le jour de la semaine.
                // on commence par le lundi, c'est-�-dire 1.         
 		 		 echo '<tr>'; 
  				 // on met des cases blanches jusqu au 1 er jours:
 		 		for ( ; $daycode<$firstday; $daycode++) {
		 		 	echo '<td>&apos;</td>';
 				}
 				// boucle pour ecrire les numero de tous les jours du mois :
		 		for ($numday = 1; $numday <= $days_in_month; $numday++, $daycode++) {
    			// si  lundi (sauf le 1er), 
   	 		// on ferme la ligne p et on en ouvre une nouvelle 
   		 		if ($daycode % 7 == 1 && $numday != 1) {
   		 			echo "</tr>\n".'<tr>';
   		 		}
    					// on ouvre la case (avec un style particulier s'il s'agit d'aujourd'hui)
			 		echo ($numday == $today ? '<td class="today">' : '<td>');
    		
    		 		echo $numday;
    		 		echo '</td>';
    		
    		
 		   }
 	
			// on met des cases blanches pour completer la derni�re semaine si besoin :
		 	 for ( ; $daycode%7 != 1; $daycode++) {
		 	 	echo '<td>&apos;</td>';

  		
 	 		}
		 	 // on ferme la derniere ligne, et la table.
  			echo '</tr>'; 
  			echo "</table>";
  			
  		}
  	}
  	
}

?>


<?php
    define("FILE", "resources/compteur.txt");
    
    /**
     * @return (int) : the new hits count value
     */
    function compteur(){
        $file = fopen(FILE, "r+");
        $nb_hits = intval(fread($file, filesize(FILE)));
        $nb_hits++;
        rewind($file);
        fwrite($file, strval($nb_hits));
        fclose($file);
        return $nb_hits;
    }

?>

<?php
/*
This PHP class is free software: you can redistribute it and/or modify
the code under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version. 

However, the license header, copyright and author credits 
must not be modified in any form and always be displayed.

This class is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

@author geoPlugin (gp_support@geoplugin.com)
@copyright Copyright geoPlugin (gp_support@geoplugin.com)
$version 1.2


This PHP class uses the PHP Webservice of http://www.geoplugin.com/ to geolocate IP addresses

Geographical location of the IP address (visitor) and locate currency (symbol, code and exchange rate) are returned.

See http://www.geoplugin.com/webservices/php for more specific details of this free service

*/

class geoPlugin {
  
  //the geoPlugin server
  var $host = 'http://www.geoplugin.net/php.gp?ip={IP}&base_currency={CURRENCY}&lang={LANG}';
    
  //the default base currency
  var $currency = 'USD';
  
  //the default language
  var $lang = 'en';
/*
supported languages:
de
en
es
fr
ja
pt-BR
ru
zh-CN
*/

  //initiate the geoPlugin vars
  var $ip = null;
  var $city = null;
  var $region = null;
  var $regionCode = null;
  var $regionName = null;
  var $dmaCode = null;
  var $countryCode = null;
  var $countryName = null;
  var $inEU = null;
  var $euVATrate = false;
  var $continentCode = null;
  var $continentName = null;
  var $latitude = null;
  var $longitude = null;
  var $locationAccuracyRadius = null;
  var $timezone = null;
  var $currencyCode = null;
  var $currencySymbol = null;
  var $currencyConverter = null;
  
  function __construct() {

  }
  
  function locate($ip = null) {
    
    global $_SERVER;
    
    if ( is_null( $ip ) ) {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    $host = str_replace( '{IP}', $ip, $this->host );
    $host = str_replace( '{CURRENCY}', $this->currency, $host );
    $host = str_replace( '{LANG}', $this->lang, $host );
    
    $data = array();
    
    $response = $this->fetch($host);
    
    $data = unserialize($response);
    
    //set the geoPlugin vars
    $this->ip = $ip;
    $this->city = $data['geoplugin_city'];
    $this->region = $data['geoplugin_region'];
    $this->regionCode = $data['geoplugin_regionCode'];
    $this->regionName = $data['geoplugin_regionName'];
    $this->dmaCode = $data['geoplugin_dmaCode'];
    $this->countryCode = $data['geoplugin_countryCode'];
    $this->countryName = $data['geoplugin_countryName'];
    $this->inEU = $data['geoplugin_inEU'];
    $this->euVATrate = $data['geoplugin_euVATrate'];
    $this->continentCode = $data['geoplugin_continentCode'];
    $this->continentName = $data['geoplugin_continentName'];
    $this->latitude = $data['geoplugin_latitude'];
    $this->longitude = $data['geoplugin_longitude'];
    $this->locationAccuracyRadius = $data['geoplugin_locationAccuracyRadius'];
    $this->timezone = $data['geoplugin_timezone'];
    $this->currencyCode = $data['geoplugin_currencyCode'];
    $this->currencySymbol = $data['geoplugin_currencySymbol'];
    $this->currencyConverter = $data['geoplugin_currencyConverter'];
    
  }
  
  function fetch($host) {

    if ( function_exists('curl_init') ) {
            
      //use cURL to fetch data
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $host);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_USERAGENT, 'geoPlugin PHP Class v1.1');
      $response = curl_exec($ch);
      curl_close ($ch);
      
    } else if ( ini_get('allow_url_fopen') ) {
      
      //fall back to fopen()
      $response = file_get_contents($host, 'r');
      
    } else {

      trigger_error ('geoPlugin class Error: Cannot retrieve data. Either compile PHP with cURL support or enable allow_url_fopen in php.ini ', E_USER_ERROR);
      return;
    
    }
    
    return $response;
  }
  
  function convert($amount, $float=2, $symbol=true) {
    
    //easily convert amounts to geolocated currency.
    if ( !is_numeric($this->currencyConverter) || $this->currencyConverter == 0 ) {
      trigger_error('geoPlugin class Notice: currencyConverter has no value.', E_USER_NOTICE);
      return $amount;
    }
    if ( !is_numeric($amount) ) {
      trigger_error ('geoPlugin class Warning: The amount passed to geoPlugin::convert is not numeric.', E_USER_WARNING);
      return $amount;
    }
    if ( $symbol === true ) {
      return $this->currencySymbol . round( ($amount * $this->currencyConverter), $float );
    } else {
      return round( ($amount * $this->currencyConverter), $float );
    }
  }
  
  function nearby($radius=10, $limit=null) {

    if ( !is_numeric($this->latitude) || !is_numeric($this->longitude) ) {
      trigger_error ('geoPlugin class Warning: Incorrect latitude or longitude values.', E_USER_NOTICE);
      return array( array() );
    }
    
    $host = "http://www.geoplugin.net/extras/nearby.gp?lat=" . $this->latitude . "&long=" . $this->longitude . "&radius={$radius}";
    
    if ( is_numeric($limit) )
      $host .= "&limit={$limit}";
      
    return unserialize( $this->fetch($host) );

  }

  
}

?>

<?php
                  function geoPlugin(){
                    $user_ip = getenv('REMOTE_ADDR');
                    $url = "http://www.geoplugin.net/xml.gp?ip=$user_ip";
                    $content = file_get_contents($url);

                    $xml = simplexml_load_string($content);
                    $json = json_encode($xml);
                    $geo = json_decode($json,TRUE);
                    
                    $ville = $geo["geoplugin_city"];
                    $departement = $geo["geoplugin_regionName"];
                    $region = $geo["geoplugin_region"];
                    $pays = $geo["geoplugin_countryName"];
                    $continent = $geo["geoplugin_continentName"];

                    echo "<div class='localisation'>";
                    echo"<p class='bigger'><strong>Localisation</strong></p>";
                    echo "<a>"."Ville : ".$ville."</a>";
                    echo "<a>Département : ".$departement."</a>";
                    echo "<a>Région : ".$region."</a>";
                    echo "<a>Pays : ".$pays."</a>";
                    echo "<a>Continent : ".$continent."</a>";
                    echo "</div>";
                  }                 
               ?>