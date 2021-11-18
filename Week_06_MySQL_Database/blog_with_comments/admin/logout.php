<?php
require_once('../includes/config.php'); // alle Konstanten für das Projek
require_once('../includes/mysql-connect.php'); // funktionen für das Projekt

require_once('../library/session.functions.php'); // alle Session funktionen 1

session_init(); // initialisiert die Session

// ausloggen (Session zurücksetzen)
setcookie (session_name(), null, -1, '/');
session_destroy();
session_write_close();

// auf das login umleiten
header('Location: login.php');
exit;
?>