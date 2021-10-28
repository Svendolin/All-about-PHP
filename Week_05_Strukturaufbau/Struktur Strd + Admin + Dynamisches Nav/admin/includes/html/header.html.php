<?php
// HTML Ausgabe des Headers mit einem dynamischen Navigationsstatus
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
				<?php if($isLoggedIn == true){ echo generateNav($admin_nav, 'nav'); }?>
				</ul>
			</nav>
		</header>
		
		