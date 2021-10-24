<?php

// 1x die KONFIGURATION auslagern (definierter Sessionname und Duration) sowie FUNKTIONEN auslagern (session_init und session_check)
require('../includes/config.php'); // Session Config laden (require besser als include, Vorgang würde gestopt werden, falls falsch)
require('../library/functions.session.php'); // Funktion Definition laden

session_init(); // NEU: Initialisiert die Session im ausgelagertem functions.php


// AUSLOGGEN
if( isset($_GET['logmeout'])) {
  // User will sich ausloggen
  $_SESSION['loginstatus'] = false; // loginstatus daduch nicht mehr auf TRUE
}

$isLoggedIn = session_check();  // NEU: Session überprüfen mittels ausgelagertem functions.php und allenfalls ausloggen

?>

<?php include(INCLUDE_FOLDER.'/header.html.php'); // einsatz der Konstante ?>

<h3>Willkommen, Admin!</h3>
<p>Dieser Bereich darf nur angezeigt werden, wenn du eingeloggt bist, 
sprich: wenn eine aktuelle Session für dich besteht, und dort drin steht, dass du eingeloggt bist<p>

<!-- Logout -->

<a href="geschuetzterBereich.php?logmeout">LOGOUT</a>

<?php include(INCLUDE_FOLDER.'/footer.html.php'); // einsatz der Konstante ?>