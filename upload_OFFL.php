<?php
        if (isset($_POST["submit"])) {
            $uploadDir = $_SESSION['file_path']; // Verzeichnis, in dem die Datei gespeichert wird
            $uploadFile = $uploadDir . basename($_FILES["datei"]["name"]); // Der volle Pfad zur Datei

            // Überprüfen, ob der Dateityp erlaubt ist
            $allowedExtensions = array("txt", "pdf");
            $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo "Dateityp nicht erlaubt.";
            } else {
                if (move_uploaded_file($_FILES["datei"]["tmp_name"], $uploadFile)) {
                    echo "Die Datei wurde erfolgreich hochgeladen.";
                } else {
                    echo "Beim Hochladen der Datei ist ein Fehler aufgetreten.";
                }
            }
        }
        ?>