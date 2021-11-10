<?php 
// --------------- CONNECT.PHP = VERBINDUNG MIT DATENBANK (DB) AUFBAUEN ------------------- //



$db_server = 'localhost'; // localhost = gleicher server wie mein Script (In den meisten Fällen so) => So versteht PhpMyAdmin die Beziehung zu diesem File
$db_user = 'root'; // In diesem Fall 'root', sonst "User von bevorzugtem Hoster"
$db_passwort = ''; // xampp = leer / mamp = 'root'
$db_name = 'wdd920_blog'; // Name der Datenbank

$conn = mysqli_connect($db_server, $db_user, $db_passwort, $db_name);

// Fallback, falls etwas in $conn nicht stimmt
if ($conn === false) {
  die('Keine Verbindung zur Datenbank');
}
// var_dump($conn);
// print_r($conn);
?>