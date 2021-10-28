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
			<h1>Profil</h1>
			<div class="uk-grid uk-grid-margin" uk-grid>
				<div class="uk-width-2-3@m">
					<div class="uk-card uk-card-default uk-card-body">
						<h3>Profil anpassen</h3>
						<p></p>
					</div>
				</div>
				
				<div class="uk-width-1-3@m">
					<div class="uk-card uk-card-default uk-card-body">
						<h3>Dein Konto</h3>
						<p>Letzter Login: 21.09.2021</p>
						<a class="uk-button uk-button-secondary" href="user.php">Konto verwalten</a>
					</div>
				</div>
			</div>
		</section>
		
<?php include('html/end.php'); ?>