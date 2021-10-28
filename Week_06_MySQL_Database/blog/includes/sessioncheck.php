<?php
session_name(CUSTOM_SESSIONNAME); // key meinEigenerSessionCookieKey statt PHPSESSID - vor session_start() und in einer App immer gleich (da sonst die Session nicht mehr gefunden wird)
session_start(); // Session Zugriff starten / Array bereitstellen mit Session-Daten, wenn vorhanden

$session_laufzeit = SESSION_EXPIRY*60; // so lange zurück darf der session timestamp liegen

if( isset( $_SESSION['isloggedin'] ) ){
// prüfen, ob es eine Session mit isloggedin ($_SESSION['isloggedin']) gibt und den Timestamp von jetzt aus time() mit dem Wert aus $_SESSION['login_timestamp'] vergleichen
	if($_SESSION['isloggedin'] != true || $_SESSION['login_timestamp']+$session_laufzeit < time() ){
		// wenn die Session nicht existiert oder der timestamp weiter zurückliegt als die erlaubte laufzeit (= kein Zugriff)...
		
		// ausloggen (Session zurücksetzen)
		setcookie (session_name(), null, -1, '/');
		session_destroy();
		session_write_close();
		
		// auf das login umleiten
		header('Location: login.php');
		exit;
	}
}else {
	header('Location: login.php');
	exit;// Tipp: das Script darf im Fall, dass kein Zugriff besteht, nciht weiterlaufen, hierfür sollte exit() oder die() verwendet werden
}

session_regenerate_id(); // neue ID für meine Session - hacker kann die alte nun nicht mehr brauchen, falls er sie hat.
$_SESSION['login_timestamp'] = time(); // aktualisieren des Timestamp

?>