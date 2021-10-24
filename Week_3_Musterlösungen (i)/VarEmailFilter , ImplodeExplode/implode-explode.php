<?php
// Implode und Explode: zwischen String und Arrays wechseln 

// EXPLODE: Aus ''String eine Array[] erstellen. Leerzeichen fungieren als Trenner
$satz = 'Ich habe viele Worte zum auseinander nehmen!';
echo 'Original Satz mit EXPLODE: '.$satz.'<br>';

$worte = explode(' ', $satz);
echo '<pre>';
print_r($worte);
echo '</pre>';

// implode: Aus Array[] einen String'' machen, indem das Leerzeichen wieder eingefügt werden
$neuerSatz = implode(' | ', $worte);
echo 'Neuer Satz mit IMPLODE: '.$neuerSatz;


?>