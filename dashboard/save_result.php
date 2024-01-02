<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $resultat = $_POST["resultat"];

    // Enregistrer le résultat dans un fichier texte
    file_put_contents("resultat.txt", $resultat);

    echo "Résultat enregistré avec succès !";
}
?>