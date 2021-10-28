<?php
require_once('../includes/config.php'); // alle Konstanten für das Projekt
require_once('../includes/mysql-connect.php'); // funktionen für das Projekt

require_once('includes/nav.php'); // Navigation für den Adminbereich
require_once('../library/session.functions.php'); // alle Session funktionen 
require_once('../library/html.functions.php'); // alle HTML funktionen


session_init();

$hidenav = true; // diese Unterseite soll keine Navigation anzeigen (könnte man auch über die Abfrage voon
$hasError = false; 
$messages = array(); 

// testadmin: terry@bytekultur.net / test1234

// wurde das Formular abgeschickt?
if( isset($_POST['username']) && isset($_POST['passwort']) ){
	// stimmen die Daten aus POST mit den gespeicherten überein?
	
	// Nach Benutzer suchen, der den angegebenen Benutzernamen (Email) hat:
	$query = "SELECT * FROM admins WHERE admin_email = '".$_POST['username']."'";
	
	// Befehl senden
	$res = mysqli_query($connection, $query);
	
	
	// Prüfen in zwei Schritten - erst sicherstellen, dass ein Admin mit angegebener E-Mail adresse gefunden wurde, dann Passwort prüfen
	if( mysqli_affected_rows($connection) == 0 ){
		// 0 Benuzter gefunden (=> Username nicht korrekt)
		$hasError = true;
		$messages[] = 'Logindaten sind nicht korrekt'; // unspezifische Fehlermeldung
	}else{
		// Admin gefunden - nun passwort prüfen
		$dbadmin = mysqli_fetch_assoc($res); // ein Datensatz mit allen Daten zu diesem Benuzter
		// print_r($userdatensatz);
		
		// wenn alles korrekt ist, loginstatus und timestamp in session. Username muss nun nicht mehr geprüft werden, da schon bei der Datenbankabfrage danach gefiltert wird	
		if(!$hasError && password_verify($_POST['passwort'], $dbadmin['admin_passwort'])==true ){ // password_verify() kann den User Input wieder zum gleichen Hash umwandeln wie der in der DB gespeicherte
			$_SESSION['loginstatus'] = true; // logintsatus speichern
			$_SESSION['lastactivity'] = time(); // timestamp in session
			$_SESSION['login_useragent'] = $_SERVER['HTTP_USER_AGENT'];
			header('Location: index.php');
		
		}else{
			// Passwort stimmt nicht überein mit dem in der DB
			$hasError = true; 
			$messages[] = 'Logindaten sind nicht korrekt'; // unspezifische Fehlermeldung
		}
	}
	
	
}


?>

<?php include('html/start.php'); ?>
		 
         <!-- #content -->
         <div class="uk-section-default uk-section">
            <div class="uk-container">
		
		
		<!-- login form -->
		<section class="uk-section-default uk-padding uk-width">
			<div class="uk-container uk-container-small">
			<h3>Bitte anmelden</h3>
			
			<?php if( count($messages)>0 ){ ?>
			<hr>
			<div class="uk-alert error">
				<?php echo implode('<br>', $messages); ?>
			</div>
			<hr>
			<?php } ?>
				<form class="uk-form" method="POST">

					<div class="uk-margin">
						<label for="fld_username">Username:</label>
						<input class="uk-input" type="text" name="username" id="fld_username" value=""><br>
					</div>
					
					<div class="uk-margin">
						<label for="fld_pw">Passwort:</label>
						<input class="uk-input" type="password" name="passwort" id="fld_pw" value=""><br>
					</div>
					
					
					<br>
					<input type="submit" class="uk-button uk-button-primary">
					
				</form>

			</div>
		</section>
	
			</div>
         </div>
         
<?php include('html/end.php'); ?>		 
		 