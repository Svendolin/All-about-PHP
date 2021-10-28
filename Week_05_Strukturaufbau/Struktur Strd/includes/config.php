<?php
/* Konfigurationsdatei:
 * Hier können Werte, die für das ganze Projekt gelten, einmal definiert werden
 * Konstanten statt Variablen benützen: diese Werte sollen im einbindenden Skript
 * NIE überschrieben werden
 * https://www.php.net/manual/de/function.define.php
 */



 // WOZU IST DIESER TEIL NOCHMAL GUT?
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/WDD920/W2/portfolio-mit-php'); // Ordner, in dem die includes liegen
define('INCLUDE_FOLDER', 'includes/html'); // UNSERE KONSTANTE DEFINIEREN: Ordner, in dem die includes liegen



// Session Konfiguration:
define('CUSTOM_SESSIONNAME', md5('meineEigeneSessionBezeichnung')); // Am besten unscheinbarar Name mit Zeichen statt meineEigeneSessionBezeichnung
// md5() erzeugt immer den gleichen HASH für den gleichen
define('SESSION_DURATION', 1*60); // 60 Sekunden, wie lange die Session inaktiv sein darf: 15*60 = 15 Minuten
?>