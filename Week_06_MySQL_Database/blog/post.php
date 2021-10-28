<?php

require_once('includes/config.php'); // alle Konstanten für das Projekt
// require_once('includes/sessioncheck.php'); // Sessioncheck zum schutz des Admintools vor unerlaubtem Zugriff
require_once('includes/mysql-connect.php'); // Sessioncheck zum schutz des Admintools vor unerlaubtem Zugriff

if( empty($_GET['article']) ){
	header("Location: index.php");
}


$urlparts = explode(':', $_GET['article']);
$articleID = $urlparts[0];
$articleAlias = $urlparts[1];
if( (int)$articleID == 0 ){
	header("Location: index.php");
}

// Daten auslesen
$query = "SELECT * FROM blogpost WHERE ID=".$articleID;
$res = mysqli_query($connection, $query);
$post = mysqli_fetch_assoc($res);



require('scripts/commentform.php');

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="author" content="Terry Harker">
      <title>PHP Blog</title>
      <link href="theme/css/fontawesome.min.css?2.6.0" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'" />
      <link href="theme/css/theme.12.css" rel="stylesheet" id="theme-style" />
      <script src="theme/js/uikit/uikit.min.js?2.6.0"></script>
      <script src="theme/js/uikit/uikit-icons-balou.min.js?2.6.0"></script>
      <script src="theme/js/theme.js?2.6.0"></script>
   </head>
   <body class="">
      <div>
         <div class="tm-header-mobile uk-hidden@m">
            <div class="uk-navbar-container">
               <nav uk-navbar="container: .tm-header-mobile">
               </nav>
            </div>
         </div>
         <div class="tm-header uk-visible@m" uk-header>
            <div class="uk-navbar-container">
               <div class="uk-container">
                  <nav class="uk-navbar" uk-navbar="{&quot;align&quot;:&quot;left&quot;,&quot;boundary&quot;:&quot;.tm-header .uk-navbar-container&quot;,&quot;container&quot;:&quot;.tm-header&quot;}">
                  </nav>
               </div>
            </div>
         </div>
		 
		 
		<!-- #header -->
		<div class="uk-section-primary">
			<div uk-img class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section" style="background-image:url(images/header.jpg);">
			   <div class="uk-container">
				  <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
					 <div>
						<h1 class="uk-text-right" data-id="page#0-0-0-0">        PHP Blog    </h1>
					 </div>
				  </div>
			   </div>
			</div>
		</div>
		<div id="tm-main"  class="tm-main uk-section uk-section-default" uk-height-viewport="expand: true">
			<div class="uk-container">		 
				<div id="system-message-container" aria-live="polite"></div>
				<div class="uk-margin-medium-bottom">
					<ul class="uk-breadcrumb">
						<li><span>Du bist hier: </span></li>
						<li><a href="index.php">Home</a></li>
						<li><span><?php echo utf8_encode($post['post_title']); ?></span></li>      
					</ul>
				</div>
				 
				<!-- #content -->
				<?php if( isset($post) && is_array($post) ) { ?>
				<article id="article-2" class="uk-article" typeof="Article">
				   <h1 property="headline" class="uk-margin-top uk-margin-remove-bottom uk-article-title">
					  <?php echo utf8_encode($post['post_title']); ?>           
				   </h1>
				   <div  class="uk-margin-medium-top" property="text">
					  <p><?php echo utf8_encode($post['post_shorttext']); ?> </p>
					  <?php echo utf8_encode($post['post_longtext']); ?> 
				   </div>
				  
					<?php include(HTMLFOLDER.'/commentform.html.php'); ?>
				</article>
				<?php } ?>
			</div>
		</div>
         
		 
		 <!-- #footer -->
         <div class="uk-section-primary uk-section">
            <div class="uk-container">
               <div class="tm-grid-expand uk-grid-margin" uk-grid>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
                        <h3 class="uk-text-left@s uk-text-center">PHP Blog</h3>
                        <div class="uk-panel uk-margin uk-text-left@s uk-text-center">
                           <p>Ein Beispiel-Blog für den Unterricht</p>
                        </div>
                     </div>
                  </div>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
					 <div class="uk-panel uk-margin uk-text-center">
                           <p><a href="admin/login.php">admin</a></p>
                        </div>
                     </div>
                  </div>
                  <div class="uk-grid-item-match uk-flex-bottom uk-width-1-3@m">
                     <div class="uk-panel uk-width-1-1">
                        <div class="uk-panel uk-margin uk-text-right@s uk-text-center">
                           <p>© 2021 Terry Harker</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>