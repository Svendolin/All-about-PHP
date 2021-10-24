<?php
/*
=> Kommentarformular MIT STYLING
=> Für die sichere Auswertung definieren wir $_POST
*/

// 1))) Variablen erzeugen - index in POST sind nicht immer vorhanden, wir wollen "verlässliche" Variablen
$hasError = false; // Statusvariable für Fehlerprüfung, um IF / ELSE zu vereinfachen. Default Wert auf false setzen
$errorMessages = array(); // NEU: Sammelcontainer für Fehlermeldungen = ERROR-ARRAY
$email = '';
$name = '';
$text = '';

// 1.1))) Gedankengänge darstellen (Array zeigen) - Für fertiges Formular BITTE RAUSKOMMENTIEREN
print_r($_POST); 

/*
	 [ABFRAGE, WENN ETWAS GESETZT IST = isset]
   isset($_POST['name']) // true, wenn 'name' in POST vorhanden

   [ABFRAGE, WENN ETWAS LEER / NICHT VORHANDEN IST = empty]  
   empty($_POST['name']) // true, wenn 'name' leer ist in POST, oder nicht vorhanden
*/

// 2))) Ziel: prüfen ob Daten abgeschickt wurden, auf leere felder prüfen (validieren), variablen mit den Daten füllen, meldung zurückgeben
if(isset($_POST['author_name']) && isset($_POST['author_email']) && isset($_POST['comment_text'])){
	// das Formular wurde abgeschickt (Action leer = diese Datei wird noch einmal aufgerufen und von oben her abgearbeitet)
	

	// 3))) Meine Arbeitsvariablen befüllen (Namen entstanden aus Imput- / Textarea Feldern = NAME) und werden dann in den VALUE gesetzt
	//Input sichern so früh wie möglich (Sichere Formularauswertung)
	$email = strip_tags($_POST['author_email']); // Mit strip_tags() sichern wir den input, d.h der Code wird gefiltert, wenn der User eingibt! = Alle tags werden gelöscht
	$name = strip_tags($_POST['author_name']); // = Alle tags werden gelöscht
	$text = strip_tags($_POST['comment_text']); /// = Alle tags werden gelöscht

	// 4))) Prüfen auf leere Werte (empty) - Alle 3 Felder mit IF-Statements prüfen. "Wenn Feld leer, dann wird der Error von False auf true gesetzt und das Echo entsteht
	if(empty($email)){
		$errorMessages[] = 'Bitte eine E-Mail Adresse angeben! '; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	} 
	// NEU: Zusätzliches IF-statement für den Filter der Email
	if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
		$errorMessages[] = 'Bitte eine gültige E-Mail Adresse angeben! '; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; 
	}
	if(empty($name)){
		$errorMessages[] = 'Bitte einen Namen angeben! '; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; 
	}
	if(empty($text)){
		$errorMessages[] = 'Dein Kommentar darf nicht leer sein!'; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; 
	}
	
	// 5))) Positive Message generieren - hasError ist immer noch false, wenn kein Fehler gefunden wurde (alles richtig ausgefüllt wurde)
	if($hasError == false){
		// Ziel, wenn alles gut gegangen ist (Felder korrekt befüllt und geprüft): speichern & Mail Verschicken an Admin
		echo 'MESSAGE SENT :-)';

	// 5.1))) OPTIONAL: Mail an Admin Versenden (Moderator)
		// $to = 'sven0815@gmx.ch'; // Oder eben zur mail-adresse von MAIL-TESTER.COM für Spam rating
		// $betreff = 'Neuer Kommentar';
		// $mailbody = 'Es wurde ein neuer Kommentar geschrieben - logge dich ein und gebe ihn frei!'; // nachricht
		// $headers = ''; // wichtig: Absender und Format (HTML oder Plain)
		// mail ($to, $betreff, $mailbody, $headers);

		// 5.2))) Wenn alles funktioniert hat, Formularwerte leeren. Dazu ganz einfach am Ende des Codes erneut die variablen von Oben mit leerem String kopieren:
		$email = '';
		$name = '';
		$text = '';
		// (php liest von oben nach unten)
	}
}
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="author" content="Sven Kamm based on TH SAE">
      <title>Commentform with Theme</title>
      <link href="css/fontawesome.min.css?2.6.0" rel="stylesheet" onload="this.onload=null;this.rel='stylesheet'" />
      <link href="css/theme.12.css" rel="stylesheet" id="theme-style" />

   </head>
   <body class="">
   
	 <!-- 6))) Fehlermeldungen anzeigen - wenn die Anzahl Fehler logischerweise mehr als 0 beträgt -->
   <?php
   if( count($errorMessages)>0 ){
	   // Alle Einträge im Error Array als String ausgeben
	   echo implode('<br>', $errorMessages); // Verbindet Array-Elemente zu einem String, umkehrbar mit explode()
   }
   ?>
   
<div class="uk-card uk-card-primary uk-card-body">
	<h4><i class="fas fa-comment"></i> Sag uns was du denkst!</h4>
	<!--<p>
	<i class="fas fa-info-circle"></i> Dein Kommentar wird zuerst von einem Administrator überprüft und genehmigt.
	Dies kann bis zu einem Werktag dauern.
	</p>-->
	<form method="POST" action="">
		<div class="uk-grid uk-grid-margin uk-child-width-1-2@m">
			
		<!-- Arbeitsvariablen einfassen in "value" -->
			<div class="uk-margin-bottom">
				<div class="uk-form-controls uk-margin">
					<input class="uk-input" type="text" name="author_name" value="<?php echo $name; ?>" placeholder="Dein Name" >
				</div>
			</div>
			<div class="uk-margin-bottom">
				<div class="uk-form-controls uk-margin">
					<input class="uk-input" type="text" name="author_email" value="<?php echo $email; ?>" placeholder="Deine E-Mail (nicht veröffentlicht)" >
				</div>
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls uk-margin">
				<textarea class="uk-textarea" name="comment_text" placeholder="Dein Kommentar" ><?php echo $text; ?></textarea>
			</div>
		</div>
		<div class="uk-margin">
			<label class="uk-form-label"> </label>
			<div class="uk-form-controls uk-margin">
				<input type="submit" class="uk-button uk-button-secondary" value="speichern">
				<input type="reset" class="uk-button uk-button-default" value="abbrechen">
			</div>
		</div>
	</form>
</div>



   </body>
</html>