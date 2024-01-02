<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $erreur = $_POST["erreur"];
    file_put_contents("erreur.txt", $erreur);
    echo "Résultat enregistré avec succès !";
}
?>