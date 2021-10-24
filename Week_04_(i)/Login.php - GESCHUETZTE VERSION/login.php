<?php

session_start(); // Zugriff auf Session Array (Ausgelagerter temporärer Speicher)
// print_r($_SESSION);


$username = 'admin';
$passwort = 'test1234';


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
           // Daten sind korrekt - user kann als eingeloggt definiert werden
             if($_POST['username'] == $username && $_POST['passwort'] == $passwort ){  
    
           // --- VARIANTE MIT GESCHUETZER BEREICH --- ///
            $_SESSION['loginstatus'] = true; // Loginstatus speichern
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