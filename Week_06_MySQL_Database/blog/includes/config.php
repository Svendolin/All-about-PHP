<?php
// SQL Konfiguration
define( 'DBSERVER', 'localhost' ); // in der Regel localhost, ausser der Server liegt nicht da wo das PHP SCript liegt
define( 'DBUSER', 'root' ); 
define( 'DBPASSWORT', '' ); // 'root' für MAMP
define( 'DBNAME', 'XXXXX' );  // diesen Wert (Name der Datenbank) musst du anpassen 

define( 'SQLDEBUG', true ); 


define( 'SESSION_EXPIRY', 5 );
define( 'CUSTOM_SESSIONNAME', 'meinEigenerSessionCookieKey' );

// folders
define( 'LIVE_SITE', '/WDD920/blog' );

define( 'IMAGEFOLDER', '../images' );
define( 'IMAGEFOLDERPATH', $_SERVER['DOCUMENT_ROOT'].'/'.LIVE_SITE.'/images' ); // diesen Ordner musst du anpassen 

define( 'HTMLFOLDER', $_SERVER['DOCUMENT_ROOT'].'/'.LIVE_SITE.'/includes/html' ); // diesen Ordner musst du anpassen 

?>