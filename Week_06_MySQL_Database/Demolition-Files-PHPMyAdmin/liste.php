<?php 
// --------------- LISTE.PHP = DATEN AUSLESEN ------------------- //

// --- Hiermit sollten wir mit der Datenbank verbunden sein --- //
require_once('connect.php');


// --- Mit 3 Post Limit (Auskommentiert): --- //
// $query = "SELECT * FROM `blogpost` ORDER BY `IDblogpost` ASC LIMIT 0,3";

// --- Ohne Post Limit: --- //
$query = "SELECT * FROM `blogpost` ORDER BY `IDblogpost`";

/* mysqlli =
ist eine verbesserte objektorientierte Erweiterung von PHP zum Zugriff 
auf MySQL-Datenbanken. */

// --- Befehl senden  als Resultat "$resultat" (Name frei wählbar) --- //
$resultat = mysqli_query($conn, $query); // Daten bestellt

/* Wegkommentieren, da dieser Datensatz ausgerpintet wird und zum ganzen DAZUZÄHLT
$datensatz = mysqli_fetch_assoc($resultat); // Daten als Assoziative Arrays bestellen https://www.w3schools.com/php/php_arrays_associative.asp
echo '<pre>';
print_r($datensatz);
echo '</pre>';
*/ 

$daten = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

echo '<pre>';
// print_r($daten);
echo '</pre>';

?>


<table class="uk-table uk-table-divider uk-table-striped">
	<tbody>
		<tr>
			<th>ID</th>
			<th>Titel</th>
			<th>Erstellungsdatum</th>
			<th>Autor</th>
			<th>Kategorie</th>
			<th> </th>
			<th> </th>
	</tr>

	<!-- Dieser Bereich werden wir mehrmals anzeigen und durch die Datenbank laufen lassen -->
	<?php foreach($daten as $datensatz) { ?>
	<tr>
		<td> <?php echo $datensatz['IDblogpost'] ?> </td>
		<td> <?php echo $datensatz['post_title'] ?> </td>
		<td> <?php echo $datensatz['post_created'] ?> </td>
		<td> <?php echo $datensatz['post_author'] ?> </td>
		<td> <?php echo $datensatz['post_category'] ?> </td>       <!-- ⬇ Prepared Links ⬇ = Bereits vorgefertigte Links -->
		<td><a class="uk-button uk-button-default uk-button-small" href="edit.php?id=<?php echo $datensatz['IDblogpost'] ?>"><i class="edit">EDIT&nbsp;</i></a></td>
		<td><a class="uk-button uk-button-default uk-button-small" href="delete.php?id=<?php echo $datensatz['IDblogpost'] ?>"><i class="delete">DELETE</i></a></td>
	</tr>

	<?php } ?>	
</tbody>
</table>