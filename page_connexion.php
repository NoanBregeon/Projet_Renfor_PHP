<?php
require_once 'liaison\Bdd.php';
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && ($password === $user['password'])) {
        // Sauvegarde des infos de base
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    
        // Récupération de la progression
        $stmt = $pdo->prepare("SELECT * FROM progression WHERE id_pseudo = ?");
        $stmt->execute([$user['id']]);
        $progression = $stmt->fetch();
    
        // Stockage dans $_SESSION
        $_SESSION['addition'] = $progression['progression_addition'];
        $_SESSION['soustraction'] = $progression['progression_soustraction'];
        $_SESSION['multiplication'] = $progression['progression_multiplication'];
        $_SESSION['division'] = $progression['progression_division'];
    
        // Redirection
        header("Location: index.php");
        exit;
    }    
    else {
        $message = "Nom d’utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/connexion.css">
</head>
<body>
    <div class="connexion-container">
        <h2>Connexion</h2>

        <?php if (isset($_SESSION['user_id'])): ?>
            <p>✅ Vous êtes déjà connecté en tant que <strong><?= ($_SESSION['nom']) ?></strong>.</p>
            <a href="liaison\deconnexion.php" class="button">Se déconnecter</a>
        <?php else: ?>
            <?php if ($message): ?>
                <p style="color:red"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>

            <form method="POST" class="connexion-form">
                <label>Nom d’utilisateur :</label><br>
                <input type="text" name="username" required><br>

                <label>Mot de passe :</label><br>
                <input type="password" name="password" required><br>

                <button type="submit" class="button">Se connecter</button>
            </form>

            <div style="margin-top: 20px;">
                <a href="index.php" class="button">⬅ Retour</a>
                <a href="creer_compte.php" class="button">Créer un compte ✍️</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


