<?php
/*
 * Beispiel für den Aufbau eines Projekts, 
 * bei dem Redundanz vermieden wird durch die Auslagerung
 * sich wiederholender Elemente
 */
include('includes/config.php'); // include der Werte, die fürs ganze projekt gelten:
include('includes/nav.php'); // include des Nav Arrays

$seite = 'index.php';  // Name der Datei, der in der Navigation abgefragt wird
?>
<?php include('html/header.html.php'); // einsatz der Konstante ?>
	
		<section>
			<div class="container">
				
				<div class="row mt-4">
					<div class="col-8">
						<h1>Willkommen - heute ist ein guter Tag zum PHP programmieren</h1>
						<p>Wir könnten die Übung Kalender 1 hier anzeigen lassen....<p>
					</div>
					<div class="col-4">col 4</div>
				</div>
			</div>
		</section>
		
<?php include('html/footer.html.php'); ?>
		