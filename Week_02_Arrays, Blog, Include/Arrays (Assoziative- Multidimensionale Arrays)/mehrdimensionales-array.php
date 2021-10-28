<?php

// Mehrdimensionales Array: die obere Ebene ist ein numerisches array, die innere ein assoziatives
$alleStudenten = array( 
	 array( 
		'vorname'=>'Eszter', 
		'nachname'=>'Uhrin', 
		'email'=>'e.uhrin@sae.students.ch' 
	),
	array( 
		'vorname'=>'Gian-Carlo', 
		'nachname'=>'Delphis', 
		'email'=>'g.delphis@sae.students.ch' 
	)

);
// Test-Ausgabe
echo '<pre>'; // formatierte darstellung
print_r($alleStudenten);
echo '</pre>'; 

// "Pfad" in die Array Struktur hinein - nun sind zwei Stufen vorhanden, wenn man ohne Loop auf die Daten zugreift
echo $alleStudenten [0]['vorname'];

// Label 
foreach( $alleStudenten as $student ){
	echo '<li>'.$student['vorname'].' '.$student['nachname'].'</li>';
}
?>