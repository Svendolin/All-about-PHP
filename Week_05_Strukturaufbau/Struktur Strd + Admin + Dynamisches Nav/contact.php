<?php
include('includes/config.php'); // include der Werte, die fürs ganze projekt gelten:
include('includes/nav.php'); // include des Nav Arrays

$seite = 'contact.php'; // Name der Datei, der in der Navigation abgefragt wird
?>
<?php include(INCLUDE_FOLDER.'/header.html.php'); // einsatz der Konstante ?>
	
		<section>
			<div class="container">
				<div class="mt-3">
					<h1>Contact me</h1>
					<p><a href="mailto:terry@bytekultur.net">terry@bytekultur.net</a></p>
				</div>
			</div>
		</section>
		
<?php include(INCLUDE_FOLDER.'/footer.html.php'); ?>