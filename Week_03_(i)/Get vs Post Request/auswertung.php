<?php
/*
AUSWERTUNG/VERARBEITUNG: 
alles, was über ein Formular abschickt wird an ein PHP Script, 
landet in einem Array, welches analog zur Sendemethode benannt ist: $_GET und $_POST
*/

// mit $_POST können Postdaten ausgelesen werden: 
echo '<h3>POST: </h3>';
echo 'Hallo '.$_POST['vorname'].' '.$_POST['nachname'];
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<h3>GET: </h3>';
// mit $_GET können Postdaten ausgelesen werden: 
echo 'Hallo '.$_GET['vorname'].' '.$_GET['nachname'];
echo '<pre>';
print_r($_GET);
echo '</pre>';
?>