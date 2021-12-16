<?php
require("config.php");
if (isset($_GET['id'])) {
    // Hier wären zusätzliche Sicherheitsmassnamen nötig:
	$id = $_GET['id'];
}

// Update record
if (isset($_POST['submit'])){
	$id = $_POST['id'];

  	$title = $_POST['title'];
  	$short_desc = $_POST['short_desc'];
  	$long_desc = $_POST['long_desc'];

  	if ($title != ''){
      	$query = "UPDATE contents SET
      	title = '$title',
      	short_desc = '$short_desc',
      	long_desc = '$long_desc'
		WHERE id = $id";
      	// echo $query;
   		mysqli_query($con, $query);
  	}
}

// Read Record
$queryRead = "SELECT * FROM contents WHERE id= ".$id;
$result = mysqli_query($con, $queryRead);
$row = $result->fetch_row();
// print_r($row);
$title = $row[1];
$short_desc = $row[2];
$long_desc = $row[3];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bearbeiten</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="ckeditor/ckeditor.js"></script>
    </head>
    <style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
    </style>
    <body>
    <br><br>
	<form method='post' action='cms_bearb.php'>
       Title :
       <input type="text" name="title" value="<?=$title?>">
		<br><br>
       Short Description:
       <textarea id='short_desc' name='short_desc'><?=$short_desc?></textarea><br>

       Long Description:
       <textarea id='long_desc' name='long_desc'><?=$long_desc?></textarea><br>
       
       <input type="hidden" name="id" value="<?=$id?>"> <!-- Special -->

       <input type="submit" name="submit" value="Submit">
    </form>


<script>
CKEDITOR.inline('short_desc', {
    language: 'de'
	//style: "border: 1px solid #555555"
});

CKEDITOR.replace( 'long_desc', {
    language: 'de',
	contentsCss: 'ckeditor/page_styles.css',
	removePlugins: 'pastefromword',
	removeButtons: 'spellchecker',
	width: '80%',
	height: 200
});


</script>
    </body>
</html>
