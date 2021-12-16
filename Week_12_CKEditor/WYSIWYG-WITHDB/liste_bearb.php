<?php
require("config.php");
$sql = "SELECT * FROM contents";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $code = "<table>\n";
    $code .= "<tr>\n";
    $code .= "<td>ID</td>\n";
    $code .= "<td>Titel</td>\n";
    $code .= "<td> </td>\n";
    $code .= "<td> </td>\n";
    $code .= "</tr>";
    while($row = $result->fetch_assoc()) {
    	$code .= "<tr>\n";
    	$code .= "<td>".$row["id"]."</td>\n";
        $code .= "<td>".$row["title"]."</td>\n";
        $code .= "<td>";
        $code .= "<a href=\"cms_bearb.php?id=".$row["id"]."\">Bearbeiten</a>";
        $code .= "</td>\n";
        $code .= "<td>";
        $code .= "<button>Löschen</button>";
        $code .= "</td>\n";
		$code .= "</tr>\n";
    }
    $code .= "</table>\n";
}

else {
    $code = "No results";
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" />
	<title>Tabelle Inhalte zum Bearbeiten</title>
    <style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        padding: 5px 10px;
    }
    </style>
</head>
<body>
<h1>Tabelle Inhalte zum Bearbeiten</h1>
<?php
echo $code;
?>
</body>
</html>
