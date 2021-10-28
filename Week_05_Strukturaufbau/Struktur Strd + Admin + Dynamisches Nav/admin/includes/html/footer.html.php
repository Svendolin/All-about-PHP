<?php
// HTML Ausgabe des Footers (HTML Ende) mit einem dynamischen Navigationsstatus
?>
		<div id="footer" class="">
		
			<?php if($isLoggedIn == true){ ?>
			<a href="?logmeout">LOGOUT</a>
			<?php } ?>
		</div>
	</body>
</html>