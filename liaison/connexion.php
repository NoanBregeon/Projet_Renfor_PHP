<?php
session_start();
include("Bdd.php");

$erreur = "";

if (isset($_POST["validation"])) {
    if (empty($_POST["nom"]) || empty($_POST["mdp"])) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        try {
            $sql1 = 'SELECT * FROM users WHERE username = ?';
            $stmt = $pdo->prepare($sql1);
            $stmt->execute([$_POST["nom"]]);
            $resultats1 = $stmt->fetch();

            if ($resultats1) {
                if (($_POST["mdp"] == $resultats1["password"])) {
                    $_SESSION["user_id"] = $resultats1["id"];
                    require_once 'maj_session.php';
                    header("Location: ../index.php");
                    exit;
                } else {
                    $erreur = "Mot de passe incorrect.";
                }
            } else {
                $erreur = "Utilisateur non trouvé.";
            }
        } catch (PDOException $e) {
            $erreur = "Erreur de connexion à la base de données : " . $e->getMessage();
        }
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
        <h1 class="connexion-title">Connexion</h1>
        <div class="connexion-form">
            <form action="" method="post">
                <input type="hidden" name="validation">
                
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" id="nom" required>
                
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
                
                <?php if (!empty($erreur)): ?>
                    <p class="user_utile"><?= htmlspecialchars($erreur) ?></p>
                <?php endif; ?>
                
                <input type="submit" class="button_connexion" value="Se connecter">
            </form>
        </div>
        <div class="form-toggle">
            <a href="creation.php" class="button_form">Créer un compte</a>
        </div>
        <div class="form-toggle">
            <a href="../index.php" class="button_form">Retour</a>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>