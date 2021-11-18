<?php

// --- index.php = Startseite (ÜBERSICHT) --- //

require_once('includes/config.php'); // alle Konstanten für das Projekt
// require_once('includes/sessioncheck.php'); // Sessioncheck zum schutz des Admintools vor unerlaubtem Zugriff
require_once('includes/mysql-connect.php'); // Sessioncheck zum schutz des Admintools vor unerlaubtem Zugriff


// Daten auslesen
$query = "SELECT * FROM blogpost WHERE post_state > 0 ORDER BY post_created DESC";
$res = mysqli_query($connection, $query);
$daten = mysqli_fetch_all($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta name="author" content="Terry Harker">
      <title>PHP Blog</title>
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
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
		 
         <div id="system-message-container" aria-live="polite"></div>
         <!-- #header -->
         <div class="uk-section-primary">
            <div uk-img class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section" style="background-image:url(images/header.jpg);">
               <div class="uk-container">
                  <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
                     <div>
                        <h1 class="uk-text-right" data-id="page#0-0-0-0">PHP Blog</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
         <!-- #content -->
         <div class="uk-section-default uk-section">
            <div class="uk-container">
               <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
                  <div>
                     <div data-id="page#1-0-0-0" class="uk-margin">
                        <div class="uk-child-width-1-1 uk-grid-divider uk-grid-match" uk-grid>
                           
					<?php if( isset($daten) && count($daten)>0 ) { ?>
						<?php foreach($daten as $datensatz) { ?>
							<?php
							$ts = strtotime( $datensatz['post_created']);
							$created = strftime("%Y-%m-%d", $ts );
							$alias = strtolower(filter_var($datensatz['post_title'], FILTER_SANITIZE_URL));
							$alias = preg_replace('/[^a-zA-Z0-9_-]+/', '-', strtolower($datensatz['post_title']));
							$slug = $datensatz['IDblogpost'].':'.$alias;
							?>
						
							<div>
                              <div class="el-item uk-panel uk-margin-remove-first-child">
                                 <h3 class="el-title uk-margin-top uk-margin-remove-bottom"><?php echo $datensatz['post_title']; ?></h3>
                                 <div class="el-meta uk-text-meta uk-margin-top"><time><?php echo $created; ?></time> | <?php echo $datensatz['post_author']; ?> | <?php echo $datensatz['post_category']; ?></div>
                                 <div class="el-content uk-panel uk-margin-top">
                                    <p><?php echo $datensatz['post_shorttext']; ?></p>
                                 </div>
                                 <div class="uk-margin-top"><a href="post.php?article=<?php echo $slug; ?>" class="el-link uk-button uk-button-default">Lesen</a></div>
                              </div>
                           </div>
						<?php } ?>
					<?php } ?>

						  
                        </div>
                     </div>
                  </div>
               </div>
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