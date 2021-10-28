<?php
/* Konfigurationsdatei:
 * Hier können Werte, die für das ganze Projekt gelten, einmal definiert werden
 * Konstanten statt Variablen benützen: diese Werte sollen im einbindenden Skript
 * NIE überschrieben werden
 * https://www.php.net/manual/de/function.define.php
 */

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/WDD920/W2/portfolio-mit-php'); // Ordner, in dem die includes liegen
define('INCLUDE_FOLDER', 'includes/html'); // Ordner, in dem die includes liegen

// Session konfiguration
define('CUSTOM_SESSIONNAME', md5('meineEigeneSessionBezeichnung')); // md5 erzeugt immer den gleichen Hash für den gleichen String, hier ist das notwendig
define('SESSION_DURATION', 1*60 ); // sekunden, wie lange die Session inaktiv sein darf
?>