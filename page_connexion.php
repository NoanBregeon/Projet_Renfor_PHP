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
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $stmt = $pdo->prepare("SELECT * FROM progression WHERE users.id");
        header("Location: dashboard.php");
        exit;
    } else {
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
    </div>
</body>
</html>

