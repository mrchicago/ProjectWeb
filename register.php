<?php
ini_set('display_errors', 1); 
use Authentication;
require('Authentication.php');
// Datenbankverbindung herstellen 
$servername = "localhost";
$username = "root";
$password = "neues-passwort";
$dbname = "Benutzeranmeldung";

// $conn = new mysqli($servername, $username, $password, $dbname);
$auth = new Authentication($servername, $username, $password, $dbname);
$benutzername = $_POST["Benutzername"];
$passwort = $_POST["Passwort"];
$email = $_POST["Email"];

if($auth->register($benutzername, $passwort, $email)){
    echo '<p>Benutzerdaten wurden erfolgreich in die Datenbank eingefügt.</p>';
    echo '<p>Verbindung steeeeeht</p>';
    echo '<p>Dein benutzername lautet'." ". $benutzername .'</p>' ;
    echo '<p>Deine Mail lautet'." ". $email. '</p>' ;
    echo '<a href="login.html"> Zum Login </a>' ;
}

else{
    $auth;
}

// Datenbankverbindung schließen
$auth->close();
?>