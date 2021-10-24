<?php
// indexierte Arrays
$alleStudenten = array('Carlo', 'Nicole', 'Dominic');
// echo $alleStudenten; // geht nicht, man sieht nicht was drin ist


echo '<pre>'; // formatierte darstellung
print_r( $alleStudenten );
echo '</pre>';

// For Loop - genau wie JS
for( $i=0; $i<count($alleStudenten); $i++ ){
	echo '<li>'.$alleStudenten[$i].'</li>';
}


// Assoziative Arrays
$student = array( 
	'vorname'=>'Eszter', 
	'nachname'=>'Uhrin', 
	'email'=>'e.uhrin@sae.students.ch' 
);

echo '<pre>'; // formatierte darstellung
print_r( $student );
echo '</pre>';

// Jeder Eintrag von $student wird in die Platzhalter-Variable $info gespeichert, wenn der Loop ausgeführt wird
foreach( $student as $info ){
	echo '<li>'.$info.'</li>';
}

// Für den Key kann auch eine Platzhalter-Variable eingesetzt werden, falls man den benötigt
foreach( $student as $label => $info ){ // $label und $info 
	echo '<li>'.$label.': '.$info.'</li>';
}

echo 'Hallo '.$student['vorname'].'!'; // 
?>