<?php
// HTML Ausgabe des Headers mit einem dynamischen Navigationsstatus
/*
echo '<pre>';
print_r($nav);
echo '</pre>';
*/
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>Portfolio</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/theme.css">
	</head>
	<body>
		<header class="navbar navbar-expand-md navbar-dark bd-navbar">
			<nav class="container flex-wrap flex-md-nowrap" aria-label="Main navigation">
				<a class="navbar-brand p-0 me-2" href="/">PORTFOLIO<a>
				<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
					<?php foreach( $nav as $item ) { ?> <!--- $nav = plural / $item = singular (Einzelne Items aus der Array von nav.php --->
					<?php
					 // print_r($item);

					 // --- Aktiver Status anzeigen: HOME SEITE = Home Seite leuchtet etc --- //
					if($seite == $item['link']){ // Wenn die Seite dem passenden Link aus nav.php passt, dann AKTIV. Ansonsten bleibt sie leer und ausgegraut!
						$statusKlasse = 'active';
					}else{
						$statusKlasse = '';
					}
					?>
					<!--- Dynamischer Navigationsstatus (Ausgelagert in includes > nav.php ) --->
					<li class="nav-item col-6 col-md-auto">
						<!--                    ⬇Aktive Ansicht zeigen⬇   ⬇index.php?page= passende link laden aus nav.php⬇   ⬇ passender Titelname laden aus nav.php ⬇    -->
						<a class="nav-link p-2 <?php echo $statusKlasse; ?>" href="index.php?page=<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
					</li>
					<?php } ?>
				</ul>
			</nav>
		</header>
		
		