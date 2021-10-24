<?php

require('config/config.php'); // NEU: Session Config laden (require besser als include, Vorgang würde gestopt werden, falls falsch)
session_name(CUSTOM_SESSIONNAME); // VOR session_start() einbauen - Ändert den NAMEN des SESSION COOKIES
session_start(); // Zugriff auf Session Array (Ausgelagerter temporärer Speicher)
session_regenerate_id(); // Ändert den WERT des SESSION ID und den NAMEN des SESSION COOKIES

// Zeigt Session Namen und Session ID:
// print_r($_COOKIE); Anzeigen lassen im Browser zum anschauen ODER via "EditThisCookie PlugIn" bei Chrome nutzen


$username = 'admin';
// $passwort = 'test1234'; NUR ZUR INFO - Dieses Passwort dient weiterhin als login, wurde aber gehashed:

// Im System unerkenntlich gemacht:
$passwort = '$2y$10$VeSikJ3gmBUXCnLEgbD1mOxxduyvSAsOiwe/u3/ZZl3Z/BcMUxu3u'; // Hashed via password-hash.php - Manuell erstellt (password_hash() generiert bei jedem Loginversuch ein neues hash)

$hasError = false; 
$messages = array(); 
$success = ''; 

if( isset($_POST['username']) && isset($_POST['passwort']) ){
    // stimmen die Daten aus POST mit den gespeicherten überein?
    
    
    if( empty($_POST['username']) || empty($_POST['passwort']) ){
        // leere Felder
        $hasError = true;
        $messages[] = 'Du musst username und passwort angeben'; // unspezifische Fehlermeldung
    }else{
        
        // Daten sind korrekt - user kann als eingeloggt definiert werden (HASHED VARIANTE)
        if($_POST['username'] == $username && password_verify ($_POST['passwort'], $passwort) === true){   

            $_SESSION['loginstatus'] = true; // Loginstatus speichern
            // NEU: Session Timeout:
            $_SESSION['lastactivity'] = time(); // timestamp in session - time() zeigt uns die aktuelle Zeit
            // NEU: Ganz viele Infos wandern bei den Requests in den $_SERVER. Useragent ist die CLIENT-UMGEBUNG. Diese sollte gleich sein wie beim Login und nicht einfach wechseln
            $_SESSION['login_useragent'] = $_SERVER['HTTP_USER_AGENT'];
            header("Location: geschuetzterBereich.php"); // Umleiten zum geschützen Bereich
            
        } else {
            // Passwort stimmt nicht überein mit dem in der DB
            $hasError = true; 
            $messages[] = 'Logindaten sind nicht korrekt'; // unspezifische Fehlermeldung
        }
    }  
    
}
// print_r($_SESSION);
?>
<h3>Bitte anmelden</h3>
            
<?php if( count($messages)>0 ){ ?>
<hr>
<div class="uk-alert error"  style="color:red">
    <?php echo implode('<br>', $messages); ?>
</div>
<hr>
<?php } ?>

<?php if( !empty($success)>0 ){ ?>
<hr>
<div class="uk-alert success"  style="color:green">
    <?php echo $success; ?>
</div>
<hr>
<?php } ?>

<form class="uk-form" method="POST">

    <div class="uk-margin">
        <label for="fld_username">Username:</label>
        <input class="uk-input" type="text" name="username" id="fld_username" value=""><br>
    </div>
    
    <div class="uk-margin">
        <label for="fld_pw">Passwort:</label>
        <input class="uk-input" type="password" name="passwort" id="fld_pw" value=""><br>
    </div>
    
    
    <br>
    <input type="submit" class="uk-button uk-button-primary">
    
</form>