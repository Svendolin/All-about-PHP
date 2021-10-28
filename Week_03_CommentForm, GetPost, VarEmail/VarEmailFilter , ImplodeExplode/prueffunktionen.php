<?php
// https://www.php.net/manual/de/function.filter-var.php

$nameExists = isset($_GET['name']);
echo "isset(): Existiert der key 'name' in GET? <br>";
echo '<pre>';
var_dump($nameExists);	
echo '</pre>';
echo ($nameExists==true) ? 'Der Key existiert':'Der key existiert nicht';
echo "<br><br>(du kannst <strong>?name=test</strong> an den URL anhängen)<br><br><br>";

$nameEmpty = empty($_GET['name']);
echo "empty(): Ist der Wert zum key 'name' in GET leer?<br>";
echo '<pre>';
var_dump($nameEmpty);	
echo '</pre>';
echo ($nameEmpty==true) ? 'Der Key existiert nicht oder der Value ist leer':'Key und Value existieren';
echo "<br><br>(du kannst <strong>?name=</strong>  an den URL anhängen)<br>";


?>