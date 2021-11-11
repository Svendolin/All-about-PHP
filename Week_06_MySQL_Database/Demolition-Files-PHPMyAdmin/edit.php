
<?php

// ------------------------------------ EDIT.PHP = DATEN BEARBEITEN ----------------------------------- //
// ---------------------------------------------- CRUD ------------------------------------------------ //
// ----------- 1) SPEICHERN > 2) MANIPULIEREN (CREATE, UPDATE, DELETE) > 3) LESEN (READ) -------------- //
// ------------------------- Wichtig: Genau sagen, was geupdated werden muss -------------------------- //



// --- Hiermit sollten wir mit der Datenbank verbunden sein --- //
require_once('connect.php'); 


// --- Variablen Initialisieren: --- //
$post_title = '';
$post_author = '';
$post_category = '';
$post_shorttext = '';
$post_longtext = '';


// --- Datensatz hinzufügen, wenn Formular abgeschickt wird = SPEICHERN (Manipulation "CUD" vor lesen "R"): --- //
// Existenz prüfen:
if( isset( $_POST['post_title']) && isset( $_POST['post_author']) && isset( $_POST['post_category']) && isset( $_POST['post_shorttext']) && isset( $_POST['post_longtext']) ){
	//print_r($_POST);
	
	// zuerst: hochgeladenes bild verarbeiten. Die Daten dazu sind in $_FILES zu finden:
	echo '<pre>';
	print_r($_FILES); // Superglobales Array = $_FILES, was Informationen zum Bild gibt (Name, Typ, wie Gross) - Wird erst gezeigt, wenn wir das Formular ausfüllen
	echo '</pre>';

	// --- Existenz prüfen: Ein Bild richig HOCHLADEN: --- //
	if ( isset($_FILES['post_image']) ) {
		// Aus tmp-Ordner holen und verschieben
		$post_image = 'hochgeladenes_bild_'.time().'.jpg'; // Bild wird mit diesem Namen überschrieben...
		$vonhier = $_FILES['post_image']['tmp_name']; // Bild wird als erstes als ein tmp-file angesehen (Temporärer Pfad)
		$nachda = 'images/'.$post_image; //Bild wird an DIESER STELLE abgelegt (In diesem Beispiel = images Ordner)
		
		// Verschieben der Datei an den Zielpfad
		$hochgeladen = move_uploaded_file($vonhier, $nachda);
		var_dump($hochgeladen); // Zum wegkommentieren
	}

/* {{{NEU}}} */


	// --- Formular abgeschickt - Erste Variablenwerte überschreiben --- //
	$ID = $_POST['ID'];
	$post_title = $_POST['post_title'];
	$post_author = $_POST['post_author'];
	$post_category = $_POST['post_category'];
	$post_shorttext = $_POST['post_shorttext'];
	$post_longtext = $_POST['post_longtext'];
	/* Nach Validierung in phpMyAdmin SQL eingegeben) und mit den Variablen angepasst (diese müssen 1:1 so heissen wir in der MySQL Datenbank)
	- Hier keine Validierung vorhanden! -
	*/


	// --- {{CRUD UPDATE}} $query zusammenstellen --- //
	$query = "UPDATE `blogpost` 
	SET 
	`post_title` = '{$post_title}',
	`post_author` = '{$post_author}',
	`post_category` = '{$post_category}',
	`post_shorttext` = '{$post_shorttext}',
	`post_longtext` = '{$post_longtext}'
	WHERE `IDBlogpost` = {$ID}
	";
	// --- Query absenden --- //
	// echo $query;
	$resultat = mysqli_query($conn, $query); // Befehl abgeschickt - job erledigt
	// --- Success Meldung für User vorbereiten: --- //
	if($resultat !== false){
		$successmessage = 'Dein Blogpost wurde gespeichert';
	}
}


	// --- {{CRUD READ}} = Auslesen mit SELECT(nach allfälliger Manipulation erledigt) --- //
	if( isset($_GET['id']) ){ // Abfragen, um welchen Datensatz es geht.
		// Durch GET Parameter können wir in der URL: edit.php?  "id=1" schreiben, dadurch lassen wir uns den "willkommen" Blog anzeigen
		$select_query ="SELECT * FROM `blogpost` WHERE `IDblogpost` = ".$_GET['id'];
		$select_resultat = mysqli_query($conn, $select_query); // Befehl abgeschickt - job erledigt
		$datensatz = mysqli_fetch_assoc($select_resultat); // Da ich Daten als assoziative Arrays möchte
		echo '<pre>';
		print_r($datensatz);
		echo '</pre>';

		// --- Formular abgeschickt - NEUE Variablenwerte überschreiben --- //
		$id = $datensatz['IDblogpost'];
		$post_title = $datensatz['post_title'];
		$post_author = $datensatz['post_author'];
		$post_category = $datensatz['post_category'];
		$post_shorttext = $datensatz['post_shorttext'];
		$post_longtext = $datensatz['post_longtext'];
	} else {
		// $id='';  
		 header('location: liste.php'); // Weiterleitung zur Liste.php
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
		<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_title" value="" required=""></div>
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
	
<!-- Variablen binden wir mit php-echos in das Formular ein an den passenden Bereichen (z.B value="" -->
	<div class="uk-margin">
        <label class="uk-form-label">Bild (JPG/PNG max. 1MB)</label>
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
			<a class="uk-button uk-button-default" href="index.php">zurück</a>
		</div>
	</div>
	
	<input type="text" name="ID" value="<?php echo $id; ?>"> <!-- type = "hidden" zu: "text" -->
</form>