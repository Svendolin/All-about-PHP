<?php
// Geschützter Bereich (WIRD ERST ANGEZEIGT: WENN SICH ÜBER login.php eingeloggt werden)


session_start(); // Zugriff auf Session Array, um sie lesen zu können
print_r($_SESSION); // Zeigt an, was passiert (bei offiziellem Gebrauch löschen)

if( isset($_GET['logmeout'])) {
  // User will sich ausloggen
  $_SESSION['loginstatus'] = false; // loginstatus daduch nicht mehr auf TRUE
}

// prüfen, ob der Besucher eingeloggt ist, nur dann darf die Seite angezeigt werden
if($_SESSION['loginstatus'] !== true){
  //session_destroy();                = Zerstört ALLES
  unset($_SESSION['loginstatus']); // = Zerstört einen bestimmten Bereich
  header("Location: login.php");
  exit; // Abbruch, parser stoppt endgültig, ohne die Datei weiter durchzulesen
}

?>
<h3>Willkommen, Admin!</h3>
<p>Dieser Bereich darf nur angezeigt werden, wenn du eingeloggt bist, 
sprich: wenn eine aktuelle Session für dich besteht, und dort drin steht, dass du eingeloggt bist<p>

<!-- Logout -->

<a href="geschuetzterBereich.php?logmeout">LOGOUT</a>