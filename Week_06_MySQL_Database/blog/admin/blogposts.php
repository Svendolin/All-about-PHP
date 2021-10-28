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


if(isset( $_GET['task'] ) && isset( $_GET['id'] ) && $_GET['task'] == 'delete'){
	$articleID = $_GET['id'];
	
	if($articleID > 0){
		$query = "DELETE FROM blogpost WHERE ID=".$articleID;
		if($res = mysqli_query($connection, $query)){
			$successMsg = 'Artikel wurde gelöscht';
		}
	}
}

// Daten auslesen
$query = "SELECT * FROM blogpost ORDER BY post_created DESC";
$res = mysqli_query($connection, $query);
$daten = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>

<?php include('html/start.php'); ?>

		<?php if($hasError == true){ ?>
		<section class="uk-section-default uk-padding uk-width">
			<div class="uk-alert">
				<?php  echo implode('<br>', $errorMsg); ?>
			</div>
		</section>
		<?php } ?>

		<?php if( isset($successMsg) ){ ?>
		<section class="uk-section-default uk-padding uk-width">
			<div class="uk-alert">
				<?php  echo $successMsg; ?>
			</div>
		</section>
		<?php } ?>
		
		<!-- produkte liste -->
		<section class="uk-section-default uk-padding uk-width">
			<h2>Blog Posts</h2>
			<div class="uk-grid uk-grid-margin" uk-grid>
				<div class=" uk-width-1-1 uk-width-2-3@m">
					<a class="uk-button uk-button-primary" href="blogpost.php">Neuer Blogeintrag</a>
					<table class="uk-table uk-table-divider uk-table-striped">
						<tr>
							<th>ID</th>
							<th>Titel</th>
							<th>Erstellungsdatum</th>
							<th>Autor</th>
							<th>Kategorie</th>
							<th></th>
							<th></th>
						</tr>
					<?php if( isset($daten) && count($daten)>0 ) { ?>
						<?php foreach($daten as $datensatz) { ?>
						<tr>
							<td><?php echo $datensatz['ID']; ?></td>
							<td><?php echo $datensatz['post_title']; ?></td>
							<td><?php echo $datensatz['post_created']; ?></td>
							<td><?php echo $datensatz['post_author']; ?></td>
							<td><?php echo $datensatz['post_category']; ?></td>
							<td><a class="uk-button uk-button-default uk-button-small" href="edit.php?task=edit&id=<?php echo $datensatz['ID']; ?>">bearbeiten</a></td>
							<td><a class="uk-button uk-button-default uk-button-small" href="index.php?task=delete&id=<?php echo $datensatz['ID']; ?>">löschen</a></td>
						</tr>
						<?php } ?>
					<?php } ?>
					</table>
				</div>
				<div class=" uk-width-1-1 uk-width-1-3@m">
					
				</div>
			</div>
		</section>
		
<?php include('html/end.php'); ?>