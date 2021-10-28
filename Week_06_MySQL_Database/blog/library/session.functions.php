<?php
/* session_init - initialisiert die Session mit eigenem Session Cookie Namen und regeneriert die Session ID
 * @return void
 */
function session_init(){
	session_name(CUSTOM_SESSIONNAME); // vor session_start() - ändert den Namen des Session Cookies
	session_start(); // Zugriff auf Session Array
	session_regenerate_id(); // ändert den Wert der Session ID und den Wert des Session Cookie
}

/* Session Handling - Zugriff auf ein Script, das auf diesen Aufruf folgt, ist nur mit einer gültigen Session möglich */
function sessioncheck(){
	$session_laufzeit = SESSION_EXPIRY*60; // so lange zurück darf der session timestamp liegen
	
	
	// prüfen, ob der User agent noch gleich ist wie beim Login
	if( $_SESSION['login_useragent'] !== $_SERVER['HTTP_USER_AGENT'] ){
		$_SESSION['loginstatus'] = false;
	}

	// prüfen, wann der user das letzte mal aktiv war
	if( $_SESSION['lastactivity'] < time()-$session_laufzeit ){
		$_SESSION['loginstatus'] = false;
	}

	// prüfen, ob der Besucher eingeloggt ist, nur dann darf die Seite angezeigt werden
	if( $_SESSION['loginstatus'] !== true ){
		// wenn die Session nicht existiert oder der timestamp weiter zurückliegt als die erlaubte laufzeit (= kein Zugriff)...
			
		// ausloggen (Session zurücksetzen)
		setcookie (session_name(), null, -1, '/');
		session_destroy();
		session_write_close();
		
		// auf das login umleiten
		return false;
	}
	

	session_regenerate_id(); // neue ID für meine Session - hacker kann die alte nun nicht mehr brauchen, falls er sie hat.
	$_SESSION['login_timestamp'] = time(); // aktualisieren des Timestamp
	return true; 

}
?>