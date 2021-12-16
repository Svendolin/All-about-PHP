
<!---------------  Informativer Teil ------------------>
<?php
/*
 * Front Controller
 */



 // --- INCLUDE CONFIGURATIONSWERTE / NAVIGATIONSWERTE --- //
include('includes/config.php'); // include der Werte, die fürs ganze projekt gelten:
include('includes/nav.php'); 		// include des Nav Arrays

$seite = 'home';
if(isset($_GET['page'])){
	$seite = strip_tags($_GET['page']); // sicherung mittels strip_tags, damit auch debugging ausgaben sicher sind...
}

// --- Zeigt an, AUF WELCHER SEITE WIR UNS BEFINDEN (Bei Business Anwendung rauskommentieren) --- //
echo '<pre>Seite aus GET: '.$seite.'</pre>';

// --- Prüft, OB EINE DATEI / VERZEICHNIS existiert --- //
if( file_exists('scripts/'.$seite.'.php') ){ // oder is_file (weitere Variante)
	include("scripts/{$seite}.php"); // andere Schreibweise, Strings und vars zusammenzusetzen. Dabei wichtig: NUR "" verwenden. Deshalb andere Schreibweise empfohlen
}
?>



<!---------------  Gestalterischer Teil ------------------>


<!--- INCLUDE HEADER --->
<?php include(INCLUDE_FOLDER.'/header.html.php'); // header HTML ?>
	

		<!--- INCLUDE 404-ERROR --->
		<?php
		if( file_exists('pages/'.$seite.'.php') ){ // oder is_file
			include("pages/{$seite}.php"); // andere Schreibweise, Strings und vars zusammenzusetzen. Dabei wichtig: NUR "" verwenden. Deshalb andere Schreibweise empfohlen
		}else{
			// 404
			?>
			<!-- HTML Zwischenstück, ansonsten durchgängig ein php Gerüst mit einem include('error/error404.html) -->
			<h3>404 - Seite nicht gefunden</h3>
			<?php
		}
		?>

<!--- INCLUDE FOOTER --->
<?php include(INCLUDE_FOLDER.'/footer.html.php'); // Footer HTML ?>
		