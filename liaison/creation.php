<?php
session_start();
include("Bdd.php");

$erreur = "";

if (isset($_POST["validation"])) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute([':username' => $_POST["nom"]]);
        $resultats1 = $stmt->fetch();

        if (!$resultats1) {
            if ($_POST["mdp"] === $_POST["confirmMdp"]) {
                $stmt = $pdo->prepare('INSERT INTO users (username, password, roles, progression_addition, progression_soustraction, progression_division, progression_multiplication) VALUES (:username, :password, "user", 1, 1, 1, 1)');
                $stmt->execute([
                    ':username' => $_POST["nom"],
                    ':password' =>$_POST["mdp"]
                ]);

                $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
                $stmt->execute([':username' => $_POST["nom"]]);
                $resultats1 = $stmt->fetch();

                if ($resultats1) {
                    $_SESSION["user_id"] = $resultats1["id"];
                    require_once 'maj_session.php';
                    header("Location: ../index.php");
                    exit;
                }
            } else {
                $erreur = "Les mots de passe ne sont pas identiques.";
            }
        } else {
            $erreur = "Cet utilisateur existe déjà.";
        }
    } catch (PDOException $e) {
        $erreur = "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gabou quiz</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="header"></div>
    <div class="connexion-container">
        <h1 class="connexion-title">Créer un compte</h1>
        <div class="connexion-form">
            <form action="" method="post">
                <input type="hidden" name="validation">
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" id="nom" required>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
                <label for="confirmMdp">Confirmez le mot de passe</label>
                <input type="password" name="confirmMdp" id="confirmMdp" required>
                <?php if (!empty($erreur)): ?>
                    <p class="user_utile"><?= htmlspecialchars($erreur) ?></p>
                <?php endif; ?>
                <input type="submit" class="button_connexion" value="Créer">
            </form>
        </div>
        <div class="form-toggle">
            <a href="connexion.php" class="button_form">Se connecter</a>
        </div>
        <div class="form-toggle">
            <a href="../index.php" class="button_form">Retour</a>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>