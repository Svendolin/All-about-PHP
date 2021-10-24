<?php
/*
=> Für die sichere Auswertung definieren wir $_POST
*/

// 1))) Variablen erzeugen - index in POST sind nicht immer vorhanden, wir wollen "verlässliche" Variablen
$hasError = false; // Statusvariable für Fehlerprüfung, um IF / ELSE zu vereinfachen. Default Wert auf false setzen
$errorMessages = array(); // Sammelcontainer für Fehlermeldungen = ERROR-ARRAY
$positiveStatement = array();
$name = '';
$password = '';

// 1.1))) Gedankengänge darstellen (Array zeigen) - Für fertiges Formular BITTE RAUSKOMMENTIEREN
// print_r($_POST); 

/*
	 [ABFRAGE, WENN ETWAS GESETZT IST = isset]
   isset($_POST['name']) // true, wenn 'name' in POST vorhanden

   [ABFRAGE, WENN ETWAS LEER / NICHT VORHANDEN IST = empty]  
   empty($_POST['name']) // true, wenn 'name' leer ist in POST, oder nicht vorhanden
*/

// 2))) Ziel: prüfen ob Daten abgeschickt wurden, auf leere felder prüfen (validieren), variablen mit den Daten füllen, meldung zurückgeben
if(isset($_POST['user_name']) && isset($_POST['user_password'])){
	// das Formular wurde abgeschickt (Action leer = diese Datei wird noch einmal aufgerufen und von oben her abgearbeitet)
	

	// 3))) Meine Arbeitsvariablen befüllen (Namen entstanden aus Imput- / Textarea Feldern = NAME) und werden dann in den VALUE gesetzt
	$name = $_POST['user_name'];
	$password = $_POST['user_password'];

	// 4))) Prüfen auf leere Werte (empty) - Alle 3 Felder mit IF-Statements prüfen. "Wenn Feld leer, dann wird der Error von False auf true gesetzt und das Echo entsteht
  if(empty($name)){
		$errorMessages[] = 'Please add your name! '; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; 
	}
	if(empty($password)){
		$errorMessages[] = 'Please enter your password! '; // NEU: nicht echo ''; sondern speichern diese Fehlermeldung in einer Error-Array ab, Schritt 6))
		$hasError = true; // wir merken uns, dass es einen Fehler gegeben hat
	} 
  // 5))) Positive Message generieren - hasError ist immer noch false, wenn kein Fehler gefunden wurde (alles richtig ausgefüllt wurde)
	if($hasError == false){
		// Ziel, wenn alles gut gegangen ist (Felder korrekt befüllt und geprüft): speichern & Mail Verschicken an Admin
		echo 'You are logged in!';
	}

  // 5.1))) Inputfelder leeren nach erfolgreicher Aktion
  $name = '';
  $password = '';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Loginform with PHP">
  <meta name="description" content="We're going to run a Loginform">
  <meta name="author" content="Svendolin">
  <title>Loginform</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="javascript/code.js" defer></script>
  
</head>

<body>
  <header>
    <form action="" method="post">
    <div class="labelbox">
      <label for="username">Username:</label>
      <input id="username" type="text" name="user_name" value="<?php echo $name; ?>" placeholder="Your name">
    </div>

    <div class="labelbox">
     <label for="pass">Password (8 characters minimum):</label>
     <input id="password" type="password" name="user_password" value="<?php echo $password; ?>" placeholder="Your Password" minlength="8"> <!-- Extrem wichtig: required standardmässig RAUSNEHMEN nach "8", es macht das ganze php kaputt -->
    </div>

    <div class="buttonbox">
      <input id="button" type="submit" value="Sign in">
    </div> 

    <div class="errormessages">
  <?php
    if( count($errorMessages)>0 ){
	     // Alle Einträge im Error Array als String ausgeben
	     echo implode('<br>', $errorMessages); // Verbindet Array-Elemente zu einem String, umkehrbar mit explode()
    }
    ?>
    </div>
    
    </form>    
  </header>

  
</body>
</html>