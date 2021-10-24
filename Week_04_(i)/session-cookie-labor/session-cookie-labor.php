<!--
	COOKIES vs SESSIONS:
  
	C => Client Seitige Speicherung. Daten werden im Browser gespeichert, bei jeder Anfrage an den Zielserver zurückgeschickt. Ein Cookie kann Zustandsaten haben (z.b Warenkorb, Sprachauswahl)
			 Zielserver entscheidet, wie lange ein Cookie gültig sein kann (MIT JAVASCRIPT aufbauen). Ein Cookie hat ein Ablaufdatum

	S => Sessions sind Serverseitige Files, welche User-Informationen enthalten (z.B Logindaten wärend eines Webseitenbesuch). 
	     Wenn der User den Browser schliesst, schliesst er auch die Session

 -->


<?php
session_start();

$hasError = false; 
$messages = array(); 

echo '<pre>COOKIE Array: ';
print_r($_COOKIE);
echo '</pre>';

echo '<pre>SESSION Array: ';
print_r($_SESSION);
echo '</pre>';

if( isset( $_GET['aktion'] ) && $_GET['aktion'] == 'los' ){ // nur wenn das Formular gesendet wurde, soll verarbeitet werden...
	if( !isset($_GET['anlegen']) ){
		$hasError = true; 
		$messages[] = "Du hast weder Cookie noch Session angewählt..."; 
	}else{
		$anlegen = $_GET['anlegen'];
	}
	
	if($hasError == false){
		switch($anlegen){
			
			case 'cookie':
				$cookieDuration = 10; // Anzahl Sekunden (Hier = 10sek), die das Cookie bestehen bleibt (Ausser User löscht Cookieverlauf im Browser vorher)
				
				setcookie('testcookie', 'Bin da!', time()+$cookieDuration, '/'); // NAME - WERT - ZEITANGABE (Ablauf Zeitstempel)
				$messages[] = 'Es wurde eine Session mit dem Wert "Bin da!" erstellt, welches ';
				break; 
			
			
			case 'session':
				$_SESSION['testsession']['value'] = 'bin da!';
				$_SESSION['testsession']['timestamp'] = time();
				$messages[] = 'Es wurde eine Session mit dem Wert "'.$_SESSION['testsession']['value'].'" um '.strftime("%d.%m.%Y %H:%M:%S", $_SESSION['testsession']['timestamp']).' erstellt';
				break; 
			
			case 'removecookie':
				setcookie('testcookie', null, -1, '/'); // cookie mit ungültigem wert überschreiben (leer, schon abgelaufen)
				unset($_COOKIE['testcookie']); 
				$messages[] = "Das Cookie wurde gelöscht";
				break; 
				
			case 'removesession':
				setcookie (session_name(), null, -1, '/');
				session_destroy();
				session_write_close();
				$messages[] = "Die Session wurde zurückgesetzt";
		}
	}
}
?>
<h3>Labor: Session & Cookies</h3>
Dieses Formular sendet den Befehl, um Cookies oder Sessions zu erstellen, per GET, damit der Weg der Informationen nachvollziehbar (sichtbar) bleibt:

<?php if( count($messages)>0 ){ ?>
<hr>
<div class="alert">
	Info: 
	<?php echo implode('<br>', $messages); ?>
</div>
<hr>
<?php } ?>

<form action="" method="GET">
	<label><input type="radio" name="anlegen" value="cookie"> <span>Cookie anlegen</span></label><br>
	<label><input type="radio" name="anlegen" value="session"> <span>Session anlegen</span></label><br>
	<label><input type="radio" name="anlegen" value="removecookie"> <span>Cookie entfernen</span></label><br>
	<label><input type="radio" name="anlegen" value="removesession"> <span>Session entfernen</span></label><br>
	<input type="submit" name="aktion" value="los">
</form>
<a href="session-cookie-labor.php"><button>neu laden</button></a>