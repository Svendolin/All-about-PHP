<?php

/* Zum AUSLAGERN in eine Function einbinden, aufbau immmer via function name() {} */



// Ausgelagerte SESSION_INIT() 
/* session_init() - initialisiert die Session mit eigenem Session Cookie Namen und regeneriert die Session ID
 * @return void
*/
function session_init() {
  session_name(CUSTOM_SESSIONNAME); // VOR session_start() einbauen - Ändert den NAMEN des SESSION COOKIES
  session_start(); // Zugriff auf Session Array (Ausgelagerter temporärer Speicher)
  session_regenerate_id(); // Ändert den WERT des SESSION ID und den NAMEN des SESSION COOKIES
}

// Ausgelagerte SESSION_CHECK() 
/* session_check() - prüft die Login Session und loggt den User bei Fehlern aus
 * @return void
*/
function session_check() {
      // NEU: prüfen, ob der USER AGENT noch gleich ist, wie beim Login
    if($_SESSION['login_useragent'] !== $_SERVER['HTTP_USER_AGENT']){
      $_SESSION['loginstatus'] = false;
    }


    // NEU: prüfen, wann der User das letzte Mal aktiv war
    if($_SESSION['lastactivity'] < time() - SESSION_DURATION){
      $_SESSION['loginstatus'] = false;
    }


    // prüfen, ob der Besucher eingeloggt ist, nur dann darf die Seite angezeigt werden
    if($_SESSION['loginstatus'] !== true){
     //session_destroy();                = Zerstört ALLES (Alle Bereiche)
     unset($_SESSION['loginstatus']); // = Zerstört einen bestimmten Bereich. Hier: loginstatus
     unset($_SESSION['lastactivity']); 
     header("Location: login.php");
     exit; // Abbruch, parser stoppt endgültig, ohne die Datei weiter durchzulesen
    }

    $_SESSION['lastactivity'] = time(); // timestamp "lastactivity" ganz am ENDE des Scripts Prüfen. Als Vobereitung des nächsten Request für den Kunden
    }

    return true;
?>