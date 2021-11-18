
<!-- VORLAGE HTML für Kommentare beim jeweiligen BLOGPOST mithilfe der articleID -->

<?php if(isset($articleID) && $articleID>0){ 
	// SELECT COUNT(*) FROM comment WHERE blogpost_id = {$articleID}
	
	$query = "SELECT author_name, DATE_FORMAT(`comment_datum`,'%d.%c.%Y um  %H:%i') AS formatiertes_datum, comment_text
	FROM `comment` 
	WHERE blogpost_id = {$articleID} 
	AND comment_status = 1";
	// echo $query; // Nicht vergessen :D

	$res = mysqli_query($connection, $query);
	$kommentare = mysqli_fetch_all($res, MYSQLI_ASSOC);
	?>
<div class="uk-card uk-card-defaul uk-card-body">
	<h4><i class="far fa-comment-alt"></i> <?php echo count($kommentare); ?> Kommentare</h4>
	<p>
	
	<div class="uk-grid-divider uk-child-width-1-1" uk-grid>
		<?php foreach($kommentare as $comment) { ?>

			<div>
				<div class="el-meta"><strong><?php echo $comment['author_name']; ?></strong> schrieb am <?php echo $comment['formatiertes_datum']; ?></div>
				<div class="el-content"><?php echo $comment['comment_text']; ?></div>
			</div>


		<?php } ?>
	</div>
	
</div>
<?php 	
}
?>