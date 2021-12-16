<?php
// CRUD

// Create
$sql1 = "INSERT INTO Personen (Nachname, Vorname, Ort) VALUES ('Peter', 'Muster', 'Musterhausen')";

// Read
$sql2 = "SELECT * FROM Personen WHERE Nachname='Balboa' AND Vorname='Manuel'";

// Update
$sql3 = "UPDATE Personen SET Nachname='Fritz', Vorname='Meier' WHERE id=201";

// Delete
$sql4 = "DELETE FROM Personen WHERE id=201";
// Typischer Anfänger-Fehler: keine Bedingung > löscht ganze Tabelle! Delete braucht immer WHERE
?>