<!DOCTYPE html>
<html lang="en">
<html>
<?php
ini_set('display_errors', 1); 
use Authentication;
require('Authentication.php');

$auth = new Authentication("localhost", "root", "neues-passwort", "Benutzeranmeldung");
//Changes

$Benutzername = $_POST["benutzername"];
$Passwort = $_POST["passwort"];
// var_dump($Benutzername, $Passwort);
if ($auth->login($Benutzername, $Passwort)) {
    echo "<p>Anmeldung erfolgreich. Willkommen, $Benutzername!</p>";
    session_start();
    $_SESSION['user_name'] = $Benutzername;
    $userExist = shell_exec('cat /etc/passwd');
$userArray = explode(":", $userExist);
// var_dump(shell_exec('cat /etc/passwd'));
$usersuche = "/home/".$Benutzername;
// var_dump($userArray, $usersuche);
if(array_search($usersuche, $userArray)){
    // echo '<a href="landingpage.php">test</a>';

    header("Location: landingpage.php"); 
}
else{
$linux_command = "sudo useradd -m -p" . " " . escapeshellarg($Benutzername);
// $linux_command = "sudo useradd -m" . " " . escapeshellarg($Benutzername);
#// exec($linux_command, $output, $return_var);
$linux_output = shell_exec($linux_command);
// var_dump($linux_output);
// if ($return_var === 0) {
if ($linux_output) {
    die("Fehler beim Erstellen des Benutzers auf dem Linux-Server");
} else {
    echo "Benutzer wurde erfolgreich erstellt";
    shell_exec('sudo chown -R www-data:www-data /home/'.$Benutzername);
    shell_exec('sudo chmod -R 755 /home/'.$Benutzername);
}
}
} else {
    echo "Anmeldung fehlgeschlagen. Überprüfen Sie Ihre Anmeldeinformationen.";
}

$auth->close();
// $home_directory = $Benutzername;
?>

<?php
    if(isset($_POST['redirect'])) {
        header('Location: <link>http://172.18.77.89/homes/</link>');
        exit;
    }
    ?>

    <form method="post">
        <button type="submit" name="redirect">Zur Download-Seite</button>
    </form>

</html>
