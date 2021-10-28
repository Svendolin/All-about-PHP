<?php

// SQL Verbindung
if( defined('DBSERVER') && defined('DBUSER') && defined('DBPASSWORT') && defined('DBNAME') ){
	$connection = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME);
	
	if ($connection == false){
		$dbgmsg = '';
		if(SQLDEBUG == true){
			$dbgmsg = 'MySQL server meldet: '.mysqli_connect_error();
		}
		die('DB verbindung hat nicht geklappt. '.$dbgmsg);
	}
}else{
	die('Konfigurationsdatei nicht gefunden oder keine Anmeldedaten vorhanden'); 
}
?>