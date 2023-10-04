
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style_login.css">
    <title>Benutzerregistrierung</title>
</head>
<body>
    <div class="container">
        <div class="nav-menu">
            <a href="landingpage.html">Home</a>
            <a href="register.html">Registrieren</a>
            <a href="login.html">Login</a>
        </div>

        <div class="login-box">
            <h1>Benutzerregistrierung</h1>
            <form action="register.php" method="post">
                <label for="benutzername">Benutzername:</label>
                <input type="text" id="benutzername" name="benutzername" required><br><br>

                <label for="passwort">Passwort:</label>
                <input type="password" id="passwort" name="passwort" required><br><br>

                <input type="submit" value="Registrieren">

                <?php
// Datenbankverbindung herstellen (verwenden Sie Ihre eigenen Zugangsdaten)
$servername = "localhost";
$username = "root";
$password = "neues-passwort";
$dbname = "Benutzeranmeldung";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen Sie die Verbindung auf Fehler
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Benutzername = $_POST["benutzername"];
    $Passwort = $_POST["passwort"];

    // SQL-Abfrage zur Überprüfung, ob der Benutzer bereits existiert
    $check_sql = "SELECT * FROM Benutzer WHERE Benutzername = '$Benutzername'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Benutzername existiert bereits
        echo "Der Benutzername ist bereits vergeben. Bitte wählen Sie einen anderen.";
    } else {
        // Benutzer registrieren
        $insert_sql = "INSERT INTO Benutzer (Benutzername, Passwort) VALUES ('$Benutzername', '$Passwort')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Registrierung erfolgreich. Willkommen, $Benutzername!";
        } else {
            echo "Fehler bei der Registrierung: " . $conn->error;
        }
    }
}

// Datenbankverbindung schließen
$conn->close();
?>
            </form>
        </div>
    </div>
</body>
</html>