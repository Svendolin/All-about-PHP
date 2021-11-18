<?php
require_once('../includes/config.php'); // alle Konstanten für das Projekt
require_once('../includes/mysql-connect.php'); // funktionen für das Projekt

require_once('includes/nav.php'); // Navigation für den Adminbereich
require_once('../library/session.functions.php'); // alle Session funktionen 
require_once('../library/html.functions.php'); // alle HTML funktionen

session_init(); // initialisiert die Session
$isLoggedIn = sessioncheck(); // Verwaltet die Session (noch gültig?)
if($isLoggedIn == false){ 
	// schüztt dieses Script vor Zurgriff ohne Login
	header("location: login.php"); 
	exit;
}

$hasError = false;
$errorMsg = array();

$ID = '';
$title = '';
$created = '';
$state ='';
$author = '';
$category = '';
$shorttext = '';
$text = '';
$image = '';

// ID Variable aus GET oder POST
if(isset($_GET['id'])){
	$ID = $_GET['id'];
}


if( !empty($ID) ){
	$getquery = "SELECT * FROM blogpost WHERE IDblogpost=".$ID;
	$res = mysqli_query($connection, $getquery);
	$datensatz = mysqli_fetch_assoc($res);
	
	$title = $datensatz['post_title'];
	$created = $datensatz['post_created'];
	$state = $datensatz['post_state'];
	$author = $datensatz['post_author'];
	$category = $datensatz['post_category'];
	$shorttext = $datensatz['post_shorttext'];
	$text = $datensatz['post_longtext']; 
	$image = $datensatz['post_image']; 
}

// prüfen ob Daten per POST verschickt wurden (aus dem Formular)
if( isset($_POST['post_title']) && isset($_POST['post_created']) && isset($_POST['post_author']) && isset($_POST['post_category']) && isset($_POST['post_shorttext']) && isset($_POST['post_longtext']) ){
	
	// variablen vorbereiten
	$erlaubte_tags = array('a', 'img', 'strong', 'em', 'p', 'blockquote', 'div', 'span', 'ul', 'ol', 'li'); 
	
	// strip_tags verhindert code injection, indem alle Tags entfernt werden.
	// mysqli_real_escape_string verhindert Probleme mit Anführungszeichen im String durch escaping, wie z.B. bei 'That's it!'
	$title = strip_tags( mysqli_real_escape_string($connection, $_POST['post_title']) );
	$created = (empty($_POST['post_created'])) ? strftime("%Y-%m-%d %H:%M:%S") : strip_tags( mysqli_real_escape_string($connection, $_POST['post_created']) );
	$state = (empty($_POST['post_state'])) ? 0 : (int)$_POST['post_state'];
	$author = strip_tags( mysqli_real_escape_string($connection, $_POST['post_author']) );
	$category = strip_tags( mysqli_real_escape_string($connection, $_POST['post_category']) );
	$shorttext = strip_tags( mysqli_real_escape_string($connection, $_POST['post_shorttext']) );
	$text = strip_tags( mysqli_real_escape_string($connection, $_POST['post_longtext']), $erlaubte_tags); // hier werden alle vom Editor angebotenen Tags vom entfernen ausgeschlossen...
	$ID = (int)$_POST['ID'];
	
	
	// Pflichtfeld Validierung
	if(empty($title)){
		$errorMsg[] = 'Bitte einen Titel angeben';
		$hasError = true;
	}
	if(empty($author)){
		$errorMsg[] = 'Bitte Namen für den Autor angeben';
		$hasError = true;
	}
	if(empty($shorttext) || empty($text) ){
		$errorMsg[] = 'Bitte sowohl den kurzen als auch den langen Text nicht vergessen';
		$hasError = true;
	}
	
	
	// wurde ein Bild hochgeladen?
	if( isset($_FILES['post_image']) && !empty($_FILES['post_image']['tmp_name']) ){
		// aus tmp ordner holen / verschieben
		$newImage = 'postimage_'.time().'.jpg'; // Bildname einzeln (für DB Eintrag)
		$src = $_FILES['post_image']['tmp_name']; // Temporär-Pfad
		$dest = IMAGEFOLDERPATH.'/'.$newImage; // Zielpfad
		
		// verschieben der Datei an den Zielpfad
		$hochgeladen = move_uploaded_file( $src, $dest );
		// var_dump($hochgeladen);
		
		// altes Bild löschen (es gäbe sicher ncoh bessere Wege, das umzusetzen)
		if( !empty($image) ){
			unlink(IMAGEFOLDERPATH.'/'.$image);
		}
	}
	
	
	if(!$hasError){
		
		// Speichern der Daten in die Datenbank
		if( empty($ID) ){ // Neu und bestehende
			$addImageField = empty($newImage)? "":", post_image"; // Zusatz für Bild, nur wenn Bild hochgeladen wurde
			$addImageValue = empty($newImage)? "":", ?"; // Zusatz für Bild, nur wenn Bild hochgeladen wurde
			
			$query = "INSERT INTO blogpost (post_title, post_state, post_created, post_author, post_category, post_shorttext, post_longtext {$addImageField})
			VALUES 
			(?, ?, ?, ?, ?, ?, ? {$addImageValue})";
			
			$res = mysqli_prepare($connection, $query); // den Server auf den auszuführenden Befehl vorbereiten (ohne Daten)
      
			if(empty($newImage)) {
			// Falls ohne Bild:
				mysqli_stmt_bind_param($res,'sssssss', $title, $state, $created, $author, $category, $shorttext, $text); // dem Server die Daten zuspielen
			} else{
			// Falls mit Bild:
				mysqli_stmt_bind_param($res,'ssssssss', $title, $state, $created, $author, $category, $shorttext, $text, $_newImage); // dem Server die Daten zuspielen
			}
      	mysqli_stmt_execute($res); // Befehl mit den geschickten Daten ausführen
      	$result = mysqli_stmt_get_result($res); // Resultat Objekt "abholen"
			
			
			// Befehl abschicken und prüfen...
			// $res = mysqli_query($connection, $query);
			$newID = mysqli_insert_id($connection);


		} else{ // bearbeiten
			$query = "UPDATE `blogpost` 
			SET 
			`post_title` = '{$title}',
			`post_state` = '{$state}',
			`post_author` = '{$author}',
			`post_created` = '{$created}',
			`post_category` = '{$category}',
			`post_shorttext` = '{$shorttext}',
			`post_longtext` = '{$text}'";
			
			// nur falls Bild hochgeladen wurde
			if(!empty($newImage)){
				$query .= ",
				`post_image` = '{$newImage}'";
			}
			$query .= " WHERE `IDBlogpost` = {$ID}";
			$res = mysqli_query($connection, $query);
		}
		// die($query);
		
		if(!empty($newImage)){
			$image = $newImage;
		}
		
		// Befehl abschicken und prüfen...
		// $res = mysqli_query($connection, $query);
		// $newID = mysqli_insert_id($connection);
		
		if( !$res ){
			$hasError = true;
			$dbgmsg = '';
			if(SQLDEBUG == true){
				$dbgmsg = mysqli_error($connection);
			}
			$errorMsg[] = 'Konnte nicht speichern. '.$dbgmsg;
		}
	}
	
	// hat geklappt
	if(!$hasError){
		$successMsg = 'Die Daten konnten gespeichert werden';
	}
}


// Möglichkeit, weitere Daten in den HHTML Head einzufügen: sammeln in Array und dann wieder flatten beim Ausgeben: 
$additional_scripts = array();
$additional_scripts[] = '<script src="https://cdn.tiny.cloud/1/ogler3a93mex6mtsfmpwb8l2bskruyk5pnxne17ql36fi75j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>';
$additional_scripts[] = "<script>
      tinymce.init({
        selector: '#editor'
      });
    </script>";
	
?>

<?php include('html/start.php'); ?>


		<!-- blogpost form -->
		<section class="uk-section-default uk-padding uk-width">
			<h2>Blogeintrag <?php echo isset($ID) ? 'editieren':'erstellen' ?></h2>
			
			<?php if($hasError == true){ ?>
			<div class="uk-alert">
				<?php  echo implode('<br>', $errorMsg); ?>
			</div>
			<?php } ?>

			<?php if( isset($successMsg) ){ ?>
			<div class="uk-alert">
				<?php  echo $successMsg; ?>
			</div>
			<?php } ?>
				
				
			<div class="uk-grid uk-grid-margin" uk-grid>
				<div class=" uk-width-1-1 uk-width-2-3@l">
					<form action="" method="POST"  class="uk-form-horizontal" enctype="multipart/form-data">
						<div class="uk-margin">
							<label class="uk-form-label">Titel</label>
							<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_title" value="<?php echo $title; ?>" required></div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label">Bild</label>
							<div class="uk-form-controls uk-margin">
								<?php if( !empty($image)){ ?>
								<img src="../images/<?php echo $image; ?>" style="max-height:100px;" /><br><br>
								<?php } ?>
								<input class="" type="file" name="post_image" value="">
							</div>
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
							<label class="uk-form-label">Estellungsdatum</label>
							<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_created" placeholder="<?php echo strftime("%Y-%m-%d %H:%M:%S"); ?>" value="<?php echo $created; ?>"></div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label">Autor</label>
							<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_author" placeholder="" value="<?php echo $author; ?>" required></div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label">Kategorie</label>
							<div class="uk-form-controls uk-margin">
								<select class="uk-select" name="post_category" required>
									<option value="">Kategorie wählen</option>
									<option value="PHP Blog">PHP Blog</option>
								</select>
							</div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label">Short Text</label>
							<div class="uk-form-controls uk-margin"><textarea class="uk-textarea" name="post_shorttext" required><?php echo $shorttext; ?></textarea></div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label">Text</label>
							<div class="uk-form-controls uk-margin"><textarea id="editor" name="post_longtext" ><?php echo $text; ?></textarea></div>
						</div>
						<div class="uk-margin">
							<label class="uk-form-label"> </label>
							<div class="uk-form-controls uk-margin">
								<input type="submit" class="uk-button uk-button-primary" value="speichern">
								<a class="uk-button uk-button-default" href="blogposts.php">zurück</a>
							</div>
						</div>
						
						<input type="hidden" name="ID" value="<?php echo $ID; ?>">
					</form>
				</div>
				<div class=" uk-width-1-1 uk-width-1-3@l">
					
				</div>
			</div>
		</section>
		
<?php include('html/end.php'); ?>