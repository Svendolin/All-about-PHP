Das ist ein eingebundenes Script: 
<?php
$dateiZumEinbinden = 'kalender_script.php';
include($dateiZumEinbinden);
?>

<!-- 

INCLUDE = "Ich hätte gerne hier..."
include($dateiZumEinbinden);

REQUIRE = "Ich brauche hier..."
require($dateiZumEinbinden);

INCLUDE = "Ich brauche es genau 1x hier"
require_once($dateiZumEinbinden);

Normalerweise funktioniert die require()-Anweisung wie include() . 
Der einzige Unterschied besteht darin, dass die include()-Anweisung nur eine PHP-Warnung erzeugt, 
aber die Skriptausführung fortsetzt, wenn die einzubindende Datei nicht gefunden wird, 
während die require()-Anweisung einen schwerwiegenden Fehler erzeugt und die Skriptausführung anhält.

-->