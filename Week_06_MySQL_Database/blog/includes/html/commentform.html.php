<?php 

// --- commentform.php = Kommentarfunktion unter den Blogpost --- //

if(isset($articleID) && $articleID>0){ 
	
	
?>
<div class="uk-card uk-card-primary uk-card-body">
	<h4><i class="far fa-comment"></i> Sag uns was du denkst!</h4>
	<p>
	
	<?php if( !empty($successMessage) ){ ?>
	<div class="uk-alert uk-alert-success">
		<?php 
		// alle einträge im Error Array als String ausgeben
		echo $successMessage; // flatten array, umkehrbar mit explode()
		?>
	</div>
	<?php }else{ ?>
	<i class="fas fa-info-circle"></i> Dein Kommentar wird zuerst von einem Administrator überprüft und genehmigt.
	Dies kann bis zu einem Werktag dauern.
	</p>	
	<?php } ?> 

	<?php if( count($errorMessages)>0 ){ ?>
	<div class="uk-alert uk-alert-danger">
		<?php 
		// alle einträge im Error Array als String ausgeben
		echo implode('<br>', $errorMessages); // flatten array, umkehrbar mit explode()
		?>
	</div>
	<?php } ?>
	<form method="POST" action="">
		<div class="uk-grid uk-grid-margin uk-child-width-1-2@m">
			
			<div class="uk-margin-bottom">
				<div class="uk-form-controls uk-margin">
					<input class="uk-input" type="text" name="author_name" value="<?php echo $name; ?>" placeholder="Dein Name" required>
				</div>
			</div>
			<div class="uk-margin-bottom">
				<div class="uk-form-controls uk-margin">
					<input class="uk-input" type="text" name="author_email" value="<?php echo $email; ?>" placeholder="Dein  E-Mail (nicht veröffentlicht)" required>
				</div>
			</div>
		</div>
		<div class="uk-margin">
			<div class="uk-form-controls uk-margin">
				<textarea class="uk-textarea" name="comment_text" placeholder="Dein Kommentar" required><?php echo $text; ?></textarea>
			</div>
		</div>
		<div class="uk-margin">
			<label class="uk-form-label"> </label>
			<div class="uk-form-controls uk-margin">
				<input type="submit" class="uk-button uk-button-secondary" value="speichern">
				<input type="reset" class="uk-button uk-button-default" value="abbrechen">
				<input type="hidden" name="articleID" value="<?php echo $articleID; ?>">
			</div>
		</div>
	</form>
</div>
<?php 	
}
?>