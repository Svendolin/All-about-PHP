
<?php
// --------------- INSERT.PHP = DATEN EINTRAGEN ------------------- //
// ------------------ INSERT = INPUTFORMULAR ---------------------- //
// ------------------- CRUD (CREATE) KREIEREN --------------------- //


// --- Hiermit sollten wir mit der Datenbank verbunden sein --- //
require_once('connect.php'); 



// --- Variablen Initialisieren: --- // 
$post_title = '';
$post_author = '';
$post_category = '';
$post_shorttext = '';
$post_longtext = '';

// Existenz prüfen:
if( isset( $_POST['post_title']) && isset( $_POST['post_author']) && isset( $_POST['post_category']) && isset( $_POST['post_shorttext']) && isset( $_POST['post_longtext']) ){
    //print_r($_POST);
		/* echo '<pre>';
		print_r($_FILES); // Superglobales Array = $_FILES, was Informationen zum Bild gibt (Name, Typ, wie Gross) - Wird erst gezeigt, wenn wir das Formular ausfüllen
		echo '</pre>'; */

		// --- Existenz prüfen: Ein Bild richig HOCHLADEN: --- //
		if ( isset($_FILES['post_image']) ) {
			$post_image = 'hochgeladenes_bild_'.time().'.jpg'; // Bild wird mit diesem Namen überschrieben...
			$vonhier = $_FILES['post_image']['tmp_name']; // Bild wird als erstes als ein tmp-file angesehen
			$nachda = 'images/'.$post_image; //Bild wird an DIESER STELLE abgelegt (In diesem Beispiel = images Ordner)
			
			$hochgeladen = move_uploaded_file($vonhier, $nachda);
			// var_dump($hochgeladen); // Zum wegkommentieren
		}
    
    // Formular abgeschickt - Variablen überschreiben (werden damit gefüllt). Die Namen beziehen sich auf die Namen der Inputfelder
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category = $_POST['post_category'];
    $post_shorttext = $_POST['post_shorttext'];
    $post_longtext = $_POST['post_longtext'];
		// Nach Validierung in phpMyAdmin SQL eingegeben) und mit den Variablen angepasst (diese müssen 1:1 so heissen wir in der MySQL Datenbank)

		/* {{{NEU}}} */

		// --- {{CRUD CREATE}} $query zusammenstellen --- //
		$query = "INSERT INTO `blogpost` 
		(`post_title`,`post_author`,`post_category`,`post_shorttext`,`post_longtext`,`post_image`)
		VALUES 
		('{$post_title}','{$post_author}','{$post_category}','{$post_shorttext}','{$post_longtext}','{$post_image}')";
		// ZUM PRÜFEN: echo $query;


		// --- Befehl senden als Resultat ""$resultat" (Name frei wählbar) --- //
		$resultat = mysqli_query($conn, $query); // Manipulationsbefehl abgeschickt = Job erledigt ($conn definiert in connection.php)
		/* mysqlli =
		ist eine verbesserte objektorientierte Erweiterung von PHP zum Zugriff 
		auf MySQL-Datenbanken. */

		if ($resultat !== false) {
				$successmessage = 'Dein Blogpost wurde gespeichert!';
		}
	}
?>

<?php 
// --- Successmeldung ausgeben --- //
if (isset($successmessage)) {
	echo '<div style="color:green;">'.$successmessage.'</div>';
}

?>

<form action="" method="POST" class="uk-form-horizontal" enctype="multipart/form-data"> <!-- Formular soll verschiedene Datenpakete mitschicken -->
	<div class="uk-margin">
		<label class="uk-form-label">Titel</label>
		<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_title" value="<?php echo $post_title; ?>" required=""></div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label">Status</label>
		<div class="uk-form-controls uk-margin">
			<select class="uk-select" name="post_state">
				<option value="0">Versteckt</option>
				<option value="1">Veröffentlicht</option>
				<option value="-1">Gelöscht (Papierkorb)</option>
			</select>
		</div>
	</div>
	

	<div class="uk-margin">
        <label class="uk-form-label">Bild (JPG/PNG max 1.MB)</label>
        <div class="uk-form-controls uk-margin">
            <input class="uk-input" type="file" name="post_image" value="">
        </div>
    </div>
	<div class="uk-margin">
		<label class="uk-form-label">Estellungsdatum</label>
		<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_created" placeholder="2021-11-04 17:15:45" value=""></div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label">Autor</label>
		<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_author" placeholder="" value="<?php echo $post_author; ?>" required=""></div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label">Kategorie</label>
		<div class="uk-form-controls uk-margin">
			<select class="uk-select" name="post_category" required="">
				<option value="">Kategorie wählen</option>
				<option value="PHP Blog">PHP Blog</option>
			</select>
		</div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label">Short Text</label>
		<div class="uk-form-controls uk-margin"><textarea class="uk-textarea" name="post_shorttext" required=""><?php echo $post_shorttext; ?></textarea></div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label">Text</label>
		<div class="uk-form-controls uk-margin"><textarea class="uk-textarea" name="post_longtext"><?php echo $post_longtext; ?></textarea></div>
	</div>
	<div class="uk-margin">
		<label class="uk-form-label"> </label>
		<div class="uk-form-controls uk-margin">
			<input type="submit" class="uk-button uk-button-primary" value="speichern">
			<a class="uk-button uk-button-default" href="liste.php">zurück</a>
		</div>
	</div>
	
	<input type="hidden" name="ID" value="">
</form>