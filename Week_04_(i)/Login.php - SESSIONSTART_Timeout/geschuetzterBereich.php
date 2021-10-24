<?php

// Geschützter Bereich (WIRD ERST ANGEZEIGT: WENN SICH ÜBER login.php eingeloggt werden)

// NEU: 1x die KONFIGURATION auslagern (definierter Sessionname und Duration) sowie FUNKTIONEN auslagern (session_init und session_check)
require('config/config.php'); // NEU: Session Config laden (require besser als include, Vorgang würde gestopt werden, falls falsch)
require('functions/functions.php');

session_init(); // NEU: Initialisiert die Session im ausgelagertem functions.php

print_r($_SESSION); // Vorgänge printen (Visuell darstellen). Bei offiziellem Gebrauch bitte kommentieren


// AUSLOGGEN
if( isset($_GET['logmeout'])) {
  // User will sich ausloggen
  $_SESSION['loginstatus'] = false; // loginstatus daduch nicht mehr auf TRUE
}

$isLoggedIn = session_check();  // NEU: Session überprüfen mittels ausgelagertem functions.php und allenfalls ausloggen

/* ---- ⬇ DIESER CODE SOLLTE AUF JEDER SEITE EINBEZOGEN WERDEN (oder ausgelagert werden, wie in in diesem Beispiel mit 2x REQUIRE ⬇ --- */

// // NEU: prüfen, ob der USER AGENT noch gleich ist, wie beim Login
// if($_SESSION['login_useragent'] !== $_SERVER['HTTP_USER_AGENT']){
//    $_SESSION['loginstatus'] = false;
// }


// // NEU: prüfen, wann der User das letzte Mal aktiv war
// if($_SESSION['lastactivity'] < time() - SESSION_DURATION){
//    $_SESSION['loginstatus'] = false;
// }


// // prüfen, ob der Besucher eingeloggt ist, nur dann darf die Seite angezeigt werden
// if($_SESSION['loginstatus'] !== true){
//   //session_destroy();                = Zerstört ALLES (Alle Bereiche)
//   unset($_SESSION['loginstatus']); // = Zerstört einen bestimmten Bereich. Hier: loginstatus
//   unset($_SESSION['lastactivity']); 
//   header("Location: login.php");
//   exit; // Abbruch, parser stoppt endgültig, ohne die Datei weiter durchzulesen
// }

// $_SESSION['lastactivity'] = time(); // timestamp "lastactivity" ganz am ENDE des Scripts Prüfen. Als Vobereitung des nächsten Request für den Kunden
// // z.B. mittels eines Rehfreshes im Browser die Seite neu laden. So dürfen wir nicht nach 60 Sekunden gekickt werden


/* ---- ⬆ CODE SOLLTE AUF JEDER SEITE EINBEZOGEN WERDEN ⬆ --- */


?>
<h3>Willkommen, Admin!</h3>
<p>Dieser Bereich darf nur angezeigt werden, wenn du eingeloggt bist, 
sprich: wenn eine aktuelle Session für dich besteht, und dort drin steht, dass du eingeloggt bist<p>

<!-- Logout -->

<a href="geschuetzterBereich.php?logmeout">LOGOUT</a>