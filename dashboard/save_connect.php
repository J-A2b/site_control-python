<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connect = $_POST["connect"];
    file_put_contents("connect.txt", $connect);
    echo "Résultat enregistré avec succès !";
}
?>