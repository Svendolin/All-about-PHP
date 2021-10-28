<?php
/*
=> Kommentarformular BLANK ohne Styling 
=> Für die sichere Auswertung definieren wir $_POST
*/

// 1))) Variablen erzeugen - index in POST sind nicht immer vorhanden, wir wollen "verlässliche" Variablen
$hasError = false; // Statusvariable für Fehlerprüfung, um IF / ELSE zu vereinfachen. Default Wert auf false setzen
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
	$email = $_POST['author_email'];
	$name = $_POST['author_name'];
	$text = $_POST['comment_text'];

	// 4))) Prüfen auf leere Werte (empty) - Alle 3 Felder mit IF-Statements prüfen. "Wenn Feld leer, dann wird der Error von False auf true gesetzt und das Echo entsteht
	if(empty($email)){
		echo 'Bitte eine E-Mail Adresse angeben! ';
		$hasError = true; 
	}
	if(empty($name)){
		echo 'Bitte einen Namen angeben! ';
		$hasError = true; 
	}
	if(empty($text)){
		echo 'Dein Kommentar darf nicht leer sein!';
		$hasError = true; 
	}
	
	// 5))) Positive Message generieren - hasError ist immer noch false, wenn kein Fehler gefunden wurde (alles richtig ausgefüllt wurde)
	if($hasError == false){
		// Ziel, wenn alles gut gegangen ist (Felder korrekt befüllt und geprüft): speichern & Mail Verschicken an Admin
		echo 'MESSAGE SENT :-)';
	}
}
?>

<!-- Arbeitsvariablen einfassen in "value" -->
<form method="POST" action="">
	<div> 
		<input class="uk-input" type="text" name="author_name" value="<?php echo $name; ?>" placeholder="Dein Name">
	</div>
	
		<input class="uk-input" type="text" name="author_email" value="<?php echo $email; ?>" placeholder="Deine E-Mail (nicht veröffentlicht)">
	</div>
	<div>
		<textarea class="uk-textarea" name="comment_text" placeholder="Dein Kommentar"><?php echo $text; ?></textarea>
	</div>
	<div>
		<input type="submit" class="uk-button uk-button-secondary" value="speichern">
		<input type="reset" class="uk-button uk-button-default" value="abbrechen">
	</div>
</form>