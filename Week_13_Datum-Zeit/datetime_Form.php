<?php
function convertStr($str) {  // ($str)
	$strWithoutT = str_replace("T", " ", $str); // "T" wird ersetzt durch "" (leer) und der Wert der Briefkastenvariable $str
	$strForMySQL = $strWithoutT.":00";
	return $strForMySQL; // Fertig formatierter String wird retour gegeben
}

if (isset($_POST['go'])) {
	echo "<pre>";
	print_r($_POST['meeting']); // Hässliches Aussehen
	echo "</pre>";
	echo "String für MySQL: ".convertStr($_POST['meeting']); // Hübsches Aussehen
	echo "<br>";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>datetime-local</title>
</head>
<body>
	<form method="post">
		<label for="meeting">Wähle das Datum und die Uhrzeit für das Meeting aus:</label><br>
		<!-- ID / Name = Wichtig, um sie in die Funktion einzubinden / type = Ergibt die Funktionen des Input fields -->
		<input type="datetime-local" id="meeting" name="meeting" value="2021-08-12T19:30" min="2021-08-12T00:00" max="2022-06-14T00:00">
		<br><br>
		<button type="submit" name="go">Verschicken</button>
</body>
</html>
