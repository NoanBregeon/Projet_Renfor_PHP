<?php
require_once 'Bdd.php';
session_start();

$message_connexion = "";
$message_creation = "";
$active_form = 'login';

// Traitement de la connexion
if (isset($_POST['login'])) {
    $active_form = 'login';
    $username = $_POST['username_login'];
    $password = $_POST['password_login'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && ($password === $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        require_once 'maj_session.php';
        header("Location: ../index.php");
        exit;
    } else {
        $message_connexion = "Nom d’utilisateur ou mot de passe incorrect.";
    }
}

// Traitement de la création de compte
if (isset($_POST['register'])) {
    $active_form = 'register';
    $username = $_POST['username_register'];
    $password = $_POST['password_register'];
    $confirm = $_POST['password_confirm'];

    if ($password !== $confirm) {
        $message_creation = "Les mots de passe ne correspondent pas.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message_creation = "Ce nom d'utilisateur est déjà pris.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, password, roles, progression_addition, progression_soustraction, progression_division, progression_multiplication) VALUES (?, ?, 'user', 1, 1, 1, 1)");
            $stmt->execute([$username, $password]);

            header("Location: connexion_et_creation.php?inscription=ok");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Création</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <style>
        .hidden { display: none; }
        .form-toggle { margin-top: 20px; display: flex; gap: 15px; justify-content: center; }
    </style>
    <script src="../scripts/form_switch.js" defer></script>
</head>
<body>
<div class="header"></div>
<div class="connexion-container">
    <h2 id="form-title"><?= $active_form === 'register' ? 'Créer un compte' : 'Connexion' ?></h2>

    <?php if (isset($_GET['inscription']) && $_GET['inscription'] === 'ok'): ?>
        <p style="color:green">Compte créé avec succès ! Vous pouvez vous connecter.</p>
    <?php endif; ?>

    <!-- Formulaire Connexion -->
    <form method="POST" class="connexion-form" id="form-login" <?= $active_form === 'register' ? 'style="display:none;"' : '' ?>>
        <?php if ($message_connexion): ?>
            <p style="color:red"><?= ($message_connexion) ?></p>
        <?php endif; ?>
        <input type="hidden" name="login" value="1">
        <label>Nom d’utilisateur :</label><br>
        <input type="text" name="username_login" required><br>
        <label>Mot de passe :</label><br>
        <input type="password" name="password_login" required><br>
        <button type="submit" class="button">Se connecter</button>
    </form>

    <!-- Formulaire Création -->
    <form method="POST" class="connexion-form" id="form-register" <?= $active_form === 'login' ? 'style="display:none;"' : '' ?>>
        <?php if ($message_creation): ?>
            <p style="color:red"><?= ($message_creation) ?></p>
        <?php endif; ?>
        <input type="hidden" name="register" value="1">
        <label>Nom d’utilisateur :</label><br>
        <input type="text" name="username_register" required><br>
        <label>Mot de passe :</label><br>
        <input type="password" name="password_register" required><br>
        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="password_confirm" required><br>
        <button type="submit" class="button">Créer le compte</button>
    </form>

    <!-- Boutons sous les formulaires -->
    <div class="form-toggle">
    <button type="button" class="button_form" id="toggle-button" data-state="<?= $active_form === 'register' ? 'register' : 'login' ?>">
        <?= $active_form === 'register' ? 'Se connecter ' : 'Créer un compte ' ?>
    </button>
    </div>
    <div class="form-toggle">
        <a href="../index.php" class="button_form">Retour</a>
    </div>
</div>
<div class="footer"></div>
</body>
</html>
