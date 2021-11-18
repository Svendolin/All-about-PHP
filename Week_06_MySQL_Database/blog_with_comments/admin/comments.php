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

// aktionen abrufen - wurde eine Aktion per GET ausgelöst? (manipulation der Daten vor auslesen)
if(isset( $_GET['task'] ) && isset( $_GET['id'] )){
	$articleID = $_GET['id'];
	
	// query vorbereiten und ausführen - je nach aktion ein anderer query und andere Message
	switch ($_GET['task']){
		
		case 'delete':
			$query = "DELETE FROM comment WHERE IDcomment=".$articleID;
			// $query = "UPDATE comment SET comment_status = -1 WHERE IDcomment=".$articleID; // papierkorb funktion statt löschen wäre auch möglich
			if($res = mysqli_query($connection, $query)){
				$successMsg = 'Kommentar wurde gelöscht';
			}
			break; 
			
		case 'approve':
			// Status aktualisieren von 0 (versteckt) zu 1 (veröffentlicht)
			$query = "UPDATE comment SET comment_status = 1 WHERE IDcomment=".$articleID;
			if($res = mysqli_query($connection, $query)){
				$successMsg = 'Kommentar wurde freigegeben';
			}
			break; 
	}
	
}


// Kommentare auslesen, die freizugeben sind (comment_status = 0)
$query = "SELECT `comment`.* , `blogpost`.`post_title` 
FROM `comment` 
JOIN `blogpost` ON `comment`.`blogpost_id`=`blogpost`.`IDblogpost` 
WHERE comment_status = 0 
ORDER BY comment_datum DESC";
$res = mysqli_query($connection, $query);
$daten = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>

<?php include('html/start.php'); ?>

		
		<!-- produkte liste -->
		<section class="uk-section-default uk-padding uk-width">
		
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
		
			<h2>Neue Kommentare</h2>
			<div class="uk-grid uk-grid-margin" uk-grid>
				<div class=" uk-width-1-1 uk-width-2-3@l">
					<table class="uk-table uk-table-divider uk-table-striped">
						<tr>
							<th>ID</th>
							<th>Blogpost</th>
							<th>Autor</th>
							<th>Email</th>
							<th>text</th>
							<th></th>
							<th></th>
						</tr>
					<?php if( isset($daten) && count($daten)>0 ) { ?>
						<?php foreach($daten as $datensatz) { ?>
						<tr>
							<td><?php echo $datensatz['IDcomment']; ?></td>
							<td><?php echo $datensatz['post_title']; ?></td>
							<td><?php echo $datensatz['author_name']; ?></td>
							<td><?php echo $datensatz['author_email']; ?></td>
							<td><?php echo $datensatz['comment_text']; ?></td>
							<td><a class="uk-button uk-button-default uk-button-small" href="comments.php?task=approve&id=<?php echo $datensatz['IDcomment']; ?>"><i class="fas fa-check"></i></a></td>
							<td><a class="uk-button uk-button-default uk-button-small" href="comments.php?task=delete&id=<?php echo $datensatz['IDcomment']; ?>"><i class="fas fa-trash-alt"></a></td>
						</tr>
						<?php } ?>
					<?php } ?>
					</table>
				</div>
				<div class=" uk-width-1-1 uk-width-1-3@l">
					
				</div>
			</div>
		</section>
		
<?php include('html/end.php'); ?>