<?php
/* session_init - initialisiert die Session mit eigenem Session Cookie Namen und regeneriert die Session ID
 * @return void
 */

 // ------------- Abschnitt für ein Login notwenig (Session bereitstellen) ------------- //
function session_init(){
	session_name(CUSTOM_SESSIONNAME); // vor session_start() - ändert den Namen des Session Cookies
	session_start(); // Zugriff auf Session Array
	session_regenerate_id(); // ändert den Wert der Session ID und den Wert des Session Cookie
}

/* session_check - prüft die Login Session und loggt einen User bei Fehlern aus
 * @return void
 */
function session_check(){
	
	// prüfen, ob der User agent noch gleich ist wie beim Login
	if( $_SESSION['login_useragent'] !== $_SERVER['HTTP_USER_AGENT'] ){
		$_SESSION['loginstatus'] = false;
	}

	// prüfen, wann der user das letzte mal aktiv war
	if( $_SESSION['lastactivity'] < time()-SESSION_DURATION ){
		$_SESSION['loginstatus'] = false;
	}

	// prüfen, ob der Besucher eingeloggt ist, nur dann darf die Seite angezeigt werden
	if( $_SESSION['loginstatus'] !== true ){
		// session_destroy();
		
		unset($_SESSION['loginstatus']);
		unset($_SESSION['lastactivity']);
		header("Location: login.php");
		exit; // abbruch, parser macht nicht mehr weiter
	}
	$_SESSION['lastactivity'] = time(); // timestamp in session ganz am ende des Scripts als Vorbereitung für nächsten Request

	return true;
}

?>