<?php
// --- config.php = SQL Serverconfiguration zu PHPMyAdmin --- //


// SQL Konfiguration als define() Konstanten
define( 'DBSERVER', 'localhost' ); // in der Regel localhost, ausser der Server liegt nicht da wo das PHP SCript liegt
define( 'DBUSER', 'root' ); 
define( 'DBPASSWORT', '' ); // 'root' für MAMP
define( 'DBNAME', 'wdd920_blog' );  // diesen Wert (Name der Datenbank) musst du anpassen 

define( 'SQLDEBUG', true ); 


define( 'SESSION_EXPIRY', 15 );
define( 'CUSTOM_SESSIONNAME', 'meinEigenerSessionCookieKey' );

// Definierter Hauptpfad zum Projekt
define( 'LIVE_SITE', 'Week_06_MySQL_Database/blog_with_comments' ); // ORDERNAME (PFAD) GENAU ANGEBEN aus htdocs (ohne htdocs als erste Instanz)! ('') geht auch fürs Hauptprojekt

define( 'IMAGEFOLDER', 'images' );
define( 'IMAGEFOLDERPATH', $_SERVER['DOCUMENT_ROOT'].'/'.LIVE_SITE.'/'.IMAGEFOLDER ); // diesen Ordner musst du anpassen {GEHT NICHT}

define( 'HTMLFOLDER', $_SERVER['DOCUMENT_ROOT'].'/'.LIVE_SITE.'/includes/html' ); // diesen Ordner musst du anpassen {GEHT NICHT}

?>
