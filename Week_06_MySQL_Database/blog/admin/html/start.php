<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="author" content="Terry Harker">
      <title>PHP Blog</title>
      <link href="../theme/css/fontawesome.min.css?2.6.0" rel="stylesheet" as="style" onload="this.onload=null;this.rel='stylesheet'" />
      <link href="../theme/css/theme.12.css" rel="stylesheet" id="theme-style" />
      <script src="../theme/js/uikit/uikit.min.js?2.6.0"></script>
      <script src="../theme/js/uikit/uikit-icons-balou.min.js?2.6.0"></script>
      <script src="../theme/js/theme.js?2.6.0"></script>
	  
	  <?php
	  if(isset($additional_scripts) && count($additional_scripts)>0){
		  foreach($additional_scripts as $script){
			  echo $script;
			  echo "\n";
		  }
	  }
	  ?>
   </head>
   <body class="">
      <div>
         <div class="tm-header-mobile uk-hidden@m">
             <nav class="uk-navbar-container uk-padding" uk-navbar="container: .tm-header-mobile">
				<div class="uk-navbar-left">
					<h3 class="uk-margin-remove-bottom" data-id="page#0-0-0-0">PHP Blog Admin</h3>
				</div>
				<div class="uk-navbar-right">
					<a class="uk-navbar-toggle" href="#tm-mobile" uk-toggle="animation: true" aria-expanded="false">
						<div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon"></div>
					</a>
				</div>
            </nav>
         </div>
         <div class="tm-header uk-visible@m" uk-header>
		   <nav class="uk-navbar-container uk-padding" uk-navbar>
				<div class="uk-navbar-left">
					<h1 class="uk-margin-remove-bottom">PHP Blog Admin</h1>
				</div>
				<div class="uk-navbar-right">
					<nav class="uk-navbar" uk-navbar="{&quot;align&quot;:&quot;left&quot;,&quot;boundary&quot;:&quot;.tm-header .uk-navbar-container&quot;,&quot;container&quot;:&quot;.tm-header&quot;}">
						<?php 
						if(!isset($hidenav) || $hidenav !== true){
							echo writeNav($admin_nav, 'uk-navbar-nav'); 
						}
						?>
					</nav>
				</div>
		   </nav>
         </div>
		 
<div class="uk-position-relative tm-header-mobile-slide">
	<div id="tm-mobile" class="uk-position-top" style="" hidden="">
		<div class="uk-background-primary uk-padding">
			<?php 
			if(!isset($hidenav) || $hidenav !== true){
				echo writeNav($admin_nav, 'uk-nav uk-nav-primary'); 
			}
			?>
		</div>
	</div>
</div>
