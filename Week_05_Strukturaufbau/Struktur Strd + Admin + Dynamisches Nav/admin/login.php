<?php
require('../includes/config.php'); // session konfiguration laden
require('../library/functions.session.php'); // funktionsdefinitionen laden
require('../library/functions.html.php'); // funktionsdefinitionen laden


session_init(); // initialisiert die Session

// print_r($_COOKIE); // zeigt session namen und session ID

$username = 'admin';
// mit password_hash() gespeichertes PW (test1234)
$passwort = '$2y$10$YNbMg7iGvWADLFSF/avbeew04Fv55EYWszXdh/WImc6mPZZRXhbrW'; 

$isLoggedIn = false; // navigation nicht anzeigen
$hasError = false; 
$messages = array(); 
$success = ''; 

if( isset($_POST['username']) && isset($_POST['passwort']) ){
	// stimmen die Daten aus POST mit den gespeicherten überein?
	
	
	if( empty($_POST['username']) || empty($_POST['passwort']) ){
		// leere Felder
		$hasError = true;
		$messages[] = 'Du musst username und passwort angeben'; // unspezifische Fehlermeldung
	}else{
		
		if($_POST['username'] == $username && password_verify( $_POST['passwort'], $passwort)===true ){
			// Daten sind korrekt - user kann als eingeloggt defniert werden
			// $success = 'Du bist eingeloggt';
			
			$_SESSION['loginstatus'] = true; // logintsatus speichern
			$_SESSION['lastactivity'] = time(); // timestamp in session
			$_SESSION['login_useragent'] = $_SERVER['HTTP_USER_AGENT'];
			header("Location: index.php"); // umleiten
			
		}else{
			// Passwort stimmt nicht überein mit dem in der DB
			$hasError = true; 
			$messages[] = 'Logindaten sind nicht korrekt'; // unspezifische Fehlermeldung
		}
	}
}
// print_r($_SESSION);
?>

<?php include(INCLUDE_FOLDER.'/header.html.php'); // einsatz der Konstante ?>

<h3>Bitte anmelden</h3>
			
<?php if( count($messages)>0 ){ ?>
<hr>
<div class="uk-alert error"  style="color:red">
	<?php echo implode('<br>', $messages); ?>
</div>
<hr>
<?php } ?>

<?php if( !empty($success)>0 ){ ?>
<hr>
<div class="uk-alert success"  style="color:green">
	<?php echo $success; ?>
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

<?php include(INCLUDE_FOLDER.'/footer.html.php'); // einsatz der Konstante ?>