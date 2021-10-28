<?php
require('../includes/config.php'); // session konfiguration laden
require('../library/functions.session.php'); // funktionsdefinitionen laden
require('../library/functions.html.php'); // funktionsdefinitionen laden
require('includes/nav.php'); // nav array für Adminbereich laden

session_init(); // initialisiert die Session

// print_r($_SESSION);


if( isset($_GET['logmeout']) ){
	// user will sich ausloggen
	$_SESSION['loginstatus'] = false; // loginstatus nicht mehr true, prüfung wird ausgelöst - man landet beim formular
}

$isLoggedIn = session_check(); // session überprüfen und allenfalls ausloggen

?>
<?php include(INCLUDE_FOLDER.'/header.html.php'); // einsatz der Konstante ?>
<h3>Willkommen, Admin!</h3>
<p>Dieser Bereich darf nur angezeigt werden, wenn du eingeloggt bist, 
sprich: wenn eine aktuelle Session für dich besteht, und dort drin steht, dass du eingeloggt bist<p>



<?php include(INCLUDE_FOLDER.'/footer.html.php'); // einsatz der Konstante ?>