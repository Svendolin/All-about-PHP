<?php
include('includes/config.php'); // include der Werte, die fürs ganze projekt gelten:
include('includes/nav.php'); // include des Nav Arrays

$seite = 'about-me.php'; // Name der Datei, der in der Navigation abgefragt wird
?>
<?php include('html/header.html.php'); // einsatz der Konstante ?>
	
	
		<section>
			<div class="container">
				<div class="mt-3">
					<h1>About me</h1>
					<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
		</section>
		
<?php include('html/footer.html.php'); ?>
