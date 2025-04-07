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
        // Stockage des infos utilisateur
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Récupération de la progression
        $stmt = $pdo->prepare("SELECT * FROM progression WHERE id_pseudo = ?");
        $stmt->execute([$user['id']]);
        $progression = $stmt->fetch();

        // Stockage dans la session
        $_SESSION['addition'] = $progression['progression_addition'];
        $_SESSION['soustraction'] = $progression['progression_soustraction'];
        $_SESSION['multiplication'] = $progression['progression_multiplication'];
        $_SESSION['division'] = $progression['progression_division'];

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

        <?php if (isset($_SESSION['user_id'])): ?>
            <p>✅ Vous êtes déjà connecté en tant que <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>.</p>
            <a href="deconnexion.php" class="button">Se déconnecter</a>

        <?php else: ?>
            <?php if (isset($_GET['inscription']) && $_GET['inscription'] === 'ok'): ?>
                <p style="color:green">✅ Compte créé avec succès ! Vous pouvez vous connecter.</p>
            <?php endif; ?>

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
                <a href="..\index.php" class="button">⬅ Retour</a>
                <a href="creer_compte.php" class="button">Créer un compte ✍️</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
