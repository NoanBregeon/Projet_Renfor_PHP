<?php
require_once 'Bdd.php';
session_start();
$message = "";

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Recherche de l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Vérification du mot de passe
    if ($user && ($password === $user['password'])) {
        $_SESSION['user_id'] = $user['id'];

        // Mise à jour de toute la session depuis la base (nom, role, progression, etc.)
        require_once 'maj_session.php';

        // Redirection
        header("Location: ../index.php");
        exit;
    } else {
        $message = "❌ Nom d’utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="..\styles\styles.css">
</head>
<body>
    <div class="connexion-container">
        <h2>Connexion</h2>
            <?php if ($message): ?>
                <p style="color:red"><?= ($message) ?></p>
            <?php endif; ?>

            <form method="POST" class="connexion-form">
                <label>Nom d’utilisateur :</label><br>
                <input type="text" name="username" required><br>

                <label>Mot de passe :</label><br>
                <input type="password" name="password" required><br>

                <button type="submit" class="button">Se connecter</button>
            </form>

            <div style="margin-top: 20px;">
                <a href="..\index.php" class="button">⬅ Retour</a>
                <a href="creer_compte.php" class="button">Créer un compte ✍️</a>
            </div>
    </div>
</body>
</html>
