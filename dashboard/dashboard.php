<!-- display_result.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de l'exécution</title>
</head>
<body>
    <header>
    <h1>dashboard</h1> 
    </header>
    <section>
        <h2>connection:</h2>
        <?php
        $resultat = file_get_contents("connect.txt");
        if ($resultat !== false) {
            echo "<pre>" . htmlspecialchars($resultat) . "</pre>";
        } else {
            echo "Aucun résultat disponible.";
        }
        ?>
    </section>
    <section>
    <h2>commande</h2>
    <form action="commande.php" method="post">
        <label for="commande">Commande :</label>
        <input type="text" id="commande" name="commande" required>
        <br>
        <input type="submit" value="Créer la commande">
        <br>
    </form>
    </section>
    <section>
    <h2>resultat:</h2>
    <?php
        $resultat = file_get_contents("resultat.txt");
        if ($resultat !== false) {
            echo "<pre>" . htmlspecialchars($resultat) . "</pre>";
        } else {
            echo "Aucun résultat disponible.";
        }
    ?>
    </section>
    <section>
    <h2>erreur:</h2>
    <?php
        $erreur = file_get_contents("erreur.txt");
        if ($erreur !== false) {
            echo "<pre>" . htmlspecialchars($resultat) . "</pre>";
        } else {
            echo "Aucun résultat disponible.";
        }
    ?>
    </section>
    <section>
    <h2>repertoire:</h2>
    <a href="erreur.txt">erreur</a>
    <br>
    <a href="resultat.txt">resultat.txt</a>
    <br>
    <a href="commande.txt">commande.txt</a>
    </section>
</body>
</html>