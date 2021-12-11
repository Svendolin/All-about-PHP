<?php
require("class/MyUpload.class.php");

if (isset($_POST['go'])) {
	// Instanzierung MIT Ordnername
	// Der Parameter stammt vom Select (ausgewählter Ordner)
	$instance = new MyUpload($_POST['galdirectories']);
	if ($instance -> ckeckFILEErrors()) {
		if ($instance -> checkFile()) {
			$instance -> moveFile();
		}
		else {
			$instance->feedback .= "<br><strong>Die Überprüfung der Datei hat Fehler ergeben!</strong>";
		}
	}
	else {
		$instance->feedback .= "<br><strong>Die Datei konnte nicht hochgeladen werden (Fehler von PHP)!</strong>";
	}
}
else {
	// 1. Affenschwanzdurchgang
	// Instanzierung OHNE Ordnername
	// Die Instanzierung muss sein, weil ich MAX_FILE_SIZE schon ausgebe
	// und auch den Select für die Wahl des Gallerieordners
	$instance = new MyUpload();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Datei-Upload - mit einer elementaren Klasse</title>
	<style>
	body {
		font-size: 18px;
		font-family: Arial, Helevetica, sans-serif;
	}
	</style>
</head>
<body>
<h1>Datei-Upload - mit einer elementaren Klasse</h1>
<?php
if ($instance->feedback != "") {
	echo "<div class=\"feedback\" style=\"padding: 15px; background-color: #FFC4FF\">\n";
	echo $instance->feedback;
	echo "</div>";
}
?>
<form action="dateiupload_elementare_klasse.php" method="post" enctype="multipart/form-data">
<?php
echo $instance->writeGalerySelect();
?>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?=$instance->myMaxFileSize?>"> <!-- Supervariable  -->
    <p>Wählen Sie die Datei aus, die hochladen möchten:</p>
    <input type="file" name="myFile" id="myFile" multiple>
    <br><br>
    <input type="submit" value="Hochladen" name="go">
</form>

</body>
</html>
