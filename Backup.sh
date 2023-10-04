#!/bin/bash

# Hier gibst du den Pfad zum Quellordner an, den du sichern möchtest
quelle="/pfad/zum/deinem/ursprungsordner"

# Hier gibst du den Pfad zum Zielordner an, in den du das Backup kopieren möchtest
ziel="/pfad/zum/deinem/zielordner"

# Überprüfen, ob der Quellordner existiert
if [ -d "$quelle" ]; then
    # Kopiere den Inhalt des Quellordners in den Zielordner
    cp -r "$quelle" "$ziel"
    echo "Backup erfolgreich erstellt."
else
    echo "Der Quellordner existiert nicht."
fi
