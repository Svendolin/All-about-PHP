<?php 

// -------------------------- DELETE.PHP = DATEN LÖSCHEN ------------------------------ //
// ------------------------------------ CRUD ------------------------------------------ //
// ------------------------------- Löschen (DELETE) ----------------------------------- //
// ---------------- Wichtig: Genau sagen, was gelöscht werden muss -------------------- //

// --- Hiermit sollten wir mit der Datenbank verbunden sein --- //
require_once('connect.php'); 

// --- Um welchen Datensatz geht es? --- //
if ( isset($_GET['id']) ) {
  $id = $_GET['id'];

  $query = "DELETE FROM `blogpost` WHERE IDblogpost = ".$id;
  // $query = "DELETE FROM `blogpost` WHERE IDblogpost IN(1,2,3);
  $select_resultat = mysqli_query($conn, $query); // Befehl abgeschickt - job erledigt
  if ($resultat === false) {

  /* if( $resultat !== false) {
     "Löschen hat funktioniert" + Rückführung zur liste.php
     echo 'funktioniert';
     header('location: liste.php');
  */
  }
}
header('location: liste.php');


?>