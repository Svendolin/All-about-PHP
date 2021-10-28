<?php
require_once('../includes/config.php'); // alle Konstanten für das Projekt
require_once('../includes/mysql-connect.php'); // funktionen für das Projekt

require_once('includes/nav.php'); // Navigation für den Adminbereich
require_once('../library/session.functions.php'); // alle Session funktionen 
require_once('../library/html.functions.php'); // alle HTML funktionen

session_init(); // initialisiert die Session
sessioncheck(); // schüztt dieses Script vor Zurgriff ohne Login

$hasError = false;
$errorMsg = array();

$title = '';
$created = '';
$state ='';
$author = '';
$category = '';
$shorttext = '';
$text = '';

if(isset($_POST['article'])){
	$postID = $_POST['article'];
}else if(isset($_GET['article'])){
	$postID = $_GET['article'];
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
	
	
	// Speichern der Daten in die Datenbank
	$query = "INSERT INTO blogpost (post_title, post_state, post_created, post_author, post_category, post_shorttext, post_longtext)
	VALUES ('".$title."', '".$state."', '".$created."', '".$author."', '".$category."', '".$shorttext."', '".$text."' ) ";

	
	// Befehl abschicken und prüfen...
	$res = mysqli_query($connection, $query);
	if( !$res ){
		$hasError = true;
		$dbgmsg = '';
		if(SQLDEBUG == true){
			$dbgmsg = mysqli_error($connection);
		}
		$errorMsg[] = 'Konnte nicht speichern. '.$dbgmsg;
	}
	
	// hat geklappt
	if(!$hasError){
		$successMsg = 'Die Daten konnten gespeichert werden';
	}
}else if( isset($postID) ){
	$getquery = "SELECT * FROM blogpost WHERE id=".$postID;
	$res = mysqli_query($connection, $getquery);
	$datensatz = mysqli_fetch_assoc($res);
	
	$title = $datensatz['post_title'];
	$created = $datensatz['post_created'];
	$state = $datensatz['post_state'];
	$author = $datensatz['post_author'];
	$category = $datensatz['post_category'];
	$shorttext = $datensatz['post_shorttext'];
	$text = $datensatz['post_longtext']; 
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
		
		<!-- blogpost form -->
		<section class="uk-section-default uk-padding uk-width">
			<h2>Blogeintrag <?php echo isset($postID) ? 'editieren':'erstellen' ?></h2>
			<div class="uk-grid uk-grid-margin" uk-grid>
				<div class=" uk-width-1-1 uk-width-2-3@m">
					<form action="" method="POST"  class="uk-form-horizontal">
						<div class="uk-margin">
							<label class="uk-form-label">Titel</label>
							<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_title" value="<?php echo $title; ?>" required></div>
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
							<div class="uk-form-controls uk-margin"><input class="uk-input" type="text" name="post_created" placeholder="<?php echo strftime("%Y-%m-%d %H:%M:%S"); ?>" value=""></div>
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
								<a class="uk-button uk-button-default" href="index.php">zurück</a>
							</div>
						</div>
						
						<input type="hidden" name="ID" value="">
					</form>
				</div>
				<div class=" uk-width-1-1 uk-width-1-3@m">
					
				</div>
			</div>
		</section>
		
<?php include('html/end.php'); ?>