<?php
// https://www.php.net/manual/de/function.filter-var.php

$email = 'sven0815@gmx.ch'; // E-Mail Adresse angeben 
/* (Geprüft wird, ob: 
- VOR dem @ etwas steht
- @ überhaupt angegeben wurde
- Maildomain vorhanden ist
- Punkt vor der Maildomain Endung existiert und eine Endung überhaupt besteht ) 
*/

$emailtest = filter_var($email, FILTER_VALIDATE_EMAIL); // Hier wird geprüft, ob der angegebenen String eine korrekte E-Mail Adresse ist

// hier kannst du testen, was zurückkommt, wenn man auf e-Mail format prüft (filtert)
echo 'Email Test: '.$emailtest;
var_dump($emailtest); // var_dump = Gibt Informationen zu einer variable aus = string und die Anzahl Buchstaben der Email

?>