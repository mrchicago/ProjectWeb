<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Verknüpfen Sie hier Ihre CSS-Datei -->

    <header>
        
            <nav class="navbar">
                <ul class="nav-menu">
                    <li><a href="landingpage.php">Home</a></li>
                    <li><a href="register.html">Registrieren</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </nav>

        <h1>Welcome to OwnCloud!</h1> 
        <h3>In der Cloud werden deine Daten sicher und geschützt aufbewahrt. Du kannst dich darauf verlassen, dass sie vor Verlust oder Beschädigung geschützt sind. Mit meinem Online-Cloud-Speicherdienst kannst du ganz einfach deine Dateien hochladen und sicher speichern. Wenn du auf meine Hauptseite gehst, findest du dort einen Login-Bereich, über den du bequem auf deine gespeicherten Daten zugreifen kannst. </h3>
    
        //Login
        
        
        <a href="login.html" class="login-button">Login</a>
    </header>

</head>

<body>

    
    <section class="login-section">
        <?php
        session_start();
        if (isset($_SESSION['user_name'])) {
            $username = $_SESSION['user_name'];
            echo '<h2>' . $username . '</h2>
        <p>Hier können sie nun Daten hoch und herunterladen.</p>
        <form method="post" action="logout.php">
        <button>Logout</button></form>';
            echo '<section class="download-section">
        <h2>Daten herunterladen</h2>
        <ul>
            <!-- Hier können Sie Links zu den herunterladbaren Dateien einfügen -->
            
            <!--<li><a href="download.php?file=example1.pdf">Beispiel 1</a></li>->
            <!--<li><a href="download.php?file=example2.zip">Beispiel 2</a></li>->
            
            <!-- Fügen Sie weitere Dateilinks hinzu, wie es benötigt wird -->
        </ul>';
        } else {
           
        }
        // $username = "benutzername"; // Ersetzen Sie "benutzername" durch den tatsächlichen Benutzernamen
        $userFolder = "/home/" . $username . "/dateinspeicher"; // Ersetzen Sie den Pfad entsprechend
        $dir = "/home/" . $username . "/dateinspeicher";
        $_SESSION['file_path'] = $dir;
        $files = scandir($userFolder);
        // var_dump($userFolder);
        echo '<div class = "file">';
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                echo "<a href='$dir/$file' download>$file</a><br>";
            }
        }
        echo '</div>';
        ?>
        <?php
        if (isset($_SESSION['user_name'])) {
            echo '<h2>Datei hochladen</h2>';
            echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
            echo '<label for="datei" class="custom-upload-btn">Datei auswählen</label>';
            echo '<input type="file" name="datei" id="datei" class="custom-upload-input">';
            echo '<input class="custom-upload-submit" type="submit" value="Hochladen" name="submit">';
            echo '</form>';
        }
        ?>


    </section>
   
</body>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> You Data ist Hosted by OwnCloud</p>
    </footer>
</html>