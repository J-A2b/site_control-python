<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $commande = $_POST["commande"];
    file_put_contents("commande.txt", $commande);
    // Rediriger vers index.html
    header("Location: dashboard.php");
    exit(); 
}
?>