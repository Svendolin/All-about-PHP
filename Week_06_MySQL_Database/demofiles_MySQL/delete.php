<?php 

// -------------------------- DELETE.PHP = DATEN LÖSCHEN ------------------------------ //
// -------------------- ÜBER "EDIT BUTTON" BEITRAG BEARBEITEN ------------------------- //
// ------------------------------- Löschen (DELETE) ----------------------------------- //
// ---------------- Wichtig: Genau sagen, was gelöscht werden muss -------------------- //


// --- Hiermit sollten wir mit der Datenbank verbunden sein --- //
require_once('connect.php'); 

// --- Um welchen Datensatz geht es? --- //
if ( isset($_GET['id']) ) {
  $id = $_GET['id'];

  $query = "DELETE FROM `blogpost` WHERE IDblogpost = ".$id; // Denn jeder Blogpost erhält seine eigene ID
  // $query = "DELETE FROM `blogpost` WHERE IDblogpost IN(1,2,3); = Mehrere löschen, falls gewünscht
  $select_resultat = mysqli_query($conn, $query); // Befehl abgeschickt - job erledigt
  if ($resultat === false) {
    // --- Fehlermeldung --- //

  /* if( $resultat !== false) {
     "Löschen hat funktioniert" + Rückführung zur liste.php
     echo 'funktioniert';
     header('location: liste.php');
  */
  }
}
header('location: liste.php');


?>