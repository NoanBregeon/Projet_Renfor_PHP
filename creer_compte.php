<?php
require_once 'liaison/Bdd.php';
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } else {
        // Vérifie si le nom d'utilisateur existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message = "❌ Ce nom d'utilisateur est déjà pris.";
        } else {
            // Création de l'utilisateur
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
            $stmt->execute([$username, $password]);

            // Récupère l'id du nouvel utilisateur
            $user_id = $pdo->lastInsertId();

            // Redirection avec succès
            header("Location: page_connexion.php?inscription=ok");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/connexion.css">
</head>
<body>
    <div class="connexion-container">
        <h2>Créer un compte</h2>

        <?php if ($message): ?>
            <p style="color:red"><?= ($message) ?></p>
        <?php endif; ?>

        <form method="POST" class="connexion-form">
            <label>Nom d’utilisateur :</label><br>
            <input type="text" name="username" required><br>

            <label>Mot de passe :</label><br>
            <input type="password" name="password" required><br>

            <label>Confirmer le mot de passe :</label><br>
            <input type="password" name="password_confirm" required><br><br>

            <button type="submit" class="button">Créer le compte</button>
        </form>

        <div style="margin-top: 20px;">
            <a href="index.php" class="button">⬅ Retour</a>
            <a href="page_connexion.php" class="button">Déjà un compte ?</a>
        </div>
    </div>
</body>
</html>
