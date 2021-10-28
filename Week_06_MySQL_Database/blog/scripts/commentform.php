<?php
/* KOMMENTARE */

// Variablen erzeugen - index in POST sind nicht immer vorhanden, wir wollen "verlässliche" Variablen
$hasError = false; // Statusvariable für Fehlerprüfung
$errorMessages = array(); // Sammelcontainer für Fehlermeldungen
$email = '';
$name = '';
$text = '';


// Ziel: prüfen ob Daten abgeschickt wurden, auf leere felder prüfen (validieren), variablen mit den Daten füllen, meldung zurückgeben
if( isset($_POST['author_name']) && isset($_POST['author_email']) && isset($_POST['comment_text']) ){
	// das Formular wurde abgeschickt (Action leer = diese Datei wird noch einmal aufgerufen und von oben her abgearbeitet)
	
	// Meine Arbeitsvariablen befüllen - input sichern so früh wie möglich
	$email = strip_tags($_POST['author_email']); // alle tags löschen
	$name = strip_tags($_POST['author_name']); // alle tags löschen
	$text = strip_tags($_POST['comment_text']); // alle tags löschen

	// Prüfen auf leere Werte - wir wollen ALLE Felder
	if(empty($email)){
		$errorMessages[] = 'Bitte eine E-Mail Adresse angeben';
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	}
	if( filter_var($email, FILTER_VALIDATE_EMAIL)==false ){
		$errorMessages[] = 'Bitte eine gültige E-Mail Adresse angeben';
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	}
	if(empty($name)){
		$errorMessages[] = 'Bitte einen Namen angeben';
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	}
	if(empty($text)){
		$errorMessages[] = 'Dein Kommentar darf nicht leer sein';
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	}
	
	// hasError ist immer noch false, wenn kein Fehler gefunden wurde oben
	if($hasError == false){
		// Ziel, wenn alles gut gegangen ist (Felder korrekt befüllt und geprüft): speichern & Mail Verschicken an Admin
		$successMessage = 'Vielen Dank für deinen Kommentar, den wir nach einer Überprüfung gerne veröffentlichen werden';
		
		// mail an moderator versenden
		$to = 'terry@bytekultur.net'; // adresse von mail-tester.com testweise hier eingeben, um ein Spam Rating zu erhalten (wird mein Mail vom Spamfilter des Empfängers akzeptiert?)
		$betreff = 'Neuer Kommentar'; // Betreff der E-Mail
		$mailbody = $name.' hat einen neuen Kommentar zum Beitrag geschrieben - logge dich ein und gebe ihn frei'."\n\n"; // eigentliche Email-nachricht
		$mailbody .= 'Das ist der Kommentar: '."\n"; // zweite Zeile Email-nachricht
		$mailbody .= $text; // dritte Zeile Email-nachricht: der zu prüfende Kommentar
		
		// wichtig: immer einen Absender und content-type (text/html oder text/plain) angeben!
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
		$headers .= 'From: <terry@bytekultur.net>' . "\r\n"; // hier sollte ein Absender drin stehen, der auch berechtigt ist, Mails von diesem Server zu senden
		$headers .= 'Reply-to: ' . $email . "\r\n"; // hier könnte die Mailadresse des Verfassers drin stehen, wenn man ihm direkt antworten können will...

		mail($to, $betreff, $mailbody, $headers);
		
		// Da alles funktioniert hat, und verarbeitung fertig - Formularvariablen wieder leeren
		$email = '';
		$name = '';
		$text = '';
	}
}
?>