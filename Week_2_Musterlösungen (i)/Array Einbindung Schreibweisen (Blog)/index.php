<?php
// andere schreibweisen Arrays: 
$blogContent = []; // liste (Array) erstellen
$unter_array = array(); // funktion, die eine Liste (Array) zurückgibt
$unter_array['titel'] = 'Terrys Blogeintrag'; // Position in Liste hinzufügen
$blogContent[] = $unter_array; // Unter-Array in Haupt-Array hinzufügen

/*
Beispiel Array mit Blog Einträgen

Siehe unten beim Output: 3 Varianten der Schreibweise, alle haben das selbe Resultat, sind aber verschieden zu handhaben im Code.
-> entscheide dich für deine Lieblings-Art, zumindest pro Projekt.
*/

// --- Wiederholende Inhalte in zusammenfassen in Array (Nützlich für Übertexte oder z.B Mitarbeiterauflistung etc)
$blogContent = array( 
	 array( 
		'titel'=>'Terrys Blogeintrag', 
		'datum'=>'2021-09-23', 
		'autor'=>'Terry', 
		'kategorie'=>'PHP Blog', 
		'text'=>'Mein Text im Blogeintrag' 
	),
	 array( 
		'titel'=>'PHP News', 
		'datum'=>'2021-09-21', 
		'autor'=>'Terry', 
		'kategorie'=>'PHP Blog', 
		'text'=>'asdlfkjadsölfkj sadlfkj adslökfj adsölfkjadsöflk' 
	)

);
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
            <div uk-img class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section">
               <div class="uk-container">
                  <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin" uk-grid>
                     <div>
                        <h1 class="uk-text-right" data-id="page#0-0-0-0">        PHP Blog    </h1>
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
                           
							<?php // Möglichkeit 1: im Anweisungsteil des Loops einen String mit HTML und PHP Werten zusammensetzen und ausgeben ?>															
							<?php foreach($blogContent as $post) {																	
							echo '<div>
                              <div class="el-item uk-panel uk-margin-remove-first-child">
                                 <h3 class="el-title uk-margin-top uk-margin-remove-bottom">'.$post['titel'].'</h3>
                                 <div class="el-meta uk-text-meta uk-margin-top"><time>'.$post['datum'].'</time> | '.$post['autor'].' | '.$post['kategorie'].'</div>
                                 <div class="el-content uk-panel uk-margin-top">
                                    <p>'.$post['text'].'</p>
                                 </div>
                                 <div class="uk-margin-top"><a href="post.php?article=10:der-erste-tag-im-php-kurs" class="el-link uk-button uk-button-default">Lesen</a></div>
                              </div>
                           </div>';
							} ?>																	
							      <!-- ------- Möglichkeit 2 ------ : --> 
							<?php // Möglichkeit 2: loop mit Klammern, dazwischen PHP beenden und HTML hineinschreiben: ?>															
							<?php foreach($blogContent as $post) { ?> <!-- (PLURAL as SINGULAR) -->
							<div>
                              <div class="el-item uk-panel uk-margin-remove-first-child">
                                 <h3 class="el-title uk-margin-top uk-margin-remove-bottom"><?php echo $post['titel']; ?></h3>
                                 <div class="el-meta uk-text-meta uk-margin-top"><time>2021-07-29</time> | <?php echo $post['autor']; ?> | <?php echo $post['kategorie']; ?></div>
                                 <div class="el-content uk-panel uk-margin-top">
                                    <p><?php echo $post['text']; ?></p>
                                 </div>
                                 <div class="uk-margin-top"><a href="post.php?article=4:php-8-release" class="el-link uk-button uk-button-default">Lesen</a></div>
                              </div>
                           </div>
						   <?php } ?>
						   
							<?php 
							/*
							* ------- Möglichkeit 3 ------ : 
							* - Alternative Schreibweise für den Loop ohne Klammern, dafür mit : und endforeach. 
							* - Alternative Schreibweise für echo in HTML
							*/
							?>															
							<?php foreach($blogContent as $post): ?>
							<div>
                              <div class="el-item uk-panel uk-margin-remove-first-child">
                                 <h3 class="el-title uk-margin-top uk-margin-remove-bottom"><?= $post['titel'] ?></h3>
                                 <div class="el-meta uk-text-meta uk-margin-top"><time><?= $post['datum'] ?></time> | <?= $post['autor'] ?> | <?= $post['kategorie'] ?></div>
                                 <div class="el-content uk-panel uk-margin-top">
                                    <p><?= $post['text']; ?></p>
                                 </div>
                                 <div class="uk-margin-top"><a href="post.php?article=4:php-8-release" class="el-link uk-button uk-button-default">Lesen</a></div>
                              </div>
                           </div>
						   <?php endforeach; ?>	
						
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