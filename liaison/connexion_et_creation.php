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
        $message_connexion = "❌ Nom d’utilisateur ou mot de passe incorrect.";
    }
}

// Traitement de la création de compte
if (isset($_POST['register'])) {
    $active_form = 'register';
    $username = $_POST['username_register'];
    $age = (int)$_POST['age'];
    $password = $_POST['password_register'];
    $confirm = $_POST['password_confirm'];

    if ($password !== $confirm) {
        $message_creation = "❌ Les mots de passe ne correspondent pas.";
    } elseif ($age < 5 || $age > 12) {
        $message_creation = "❌ L'âge doit être entre 5 et 12 ans.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message_creation = "❌ Ce nom d'utilisateur est déjà pris.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, password, age, role, progression_addition, progression_soustraction, progression_division, progression_multiplication) VALUES (?, ?, ?, 'user', 1, 1, 1, 1)");
            $stmt->execute([$username, $password, $age]);

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
    <link rel="stylesheet" href="../styles/connexion.css">
    <style>
        .hidden { display: none; }
        .form-toggle { margin-top: 20px; }
        .form-toggle button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="connexion-container">
    <h2 id="form-title"><?= $active_form === 'register' ? 'Créer un compte ✍️' : 'Connexion 🔐' ?></h2>

    <?php if (isset($_GET['inscription']) && $_GET['inscription'] === 'ok'): ?>
        <p style="color:green">✅ Compte créé avec succès ! Vous pouvez vous connecter.</p>
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
        <label>Âge :</label><br>
        <input type="number" name="age" min="5" max="12" required><br>
        <label>Mot de passe :</label><br>
        <input type="password" name="password_register" required><br>
        <label>Confirmer le mot de passe :</label><br>
        <input type="password" name="password_confirm" required><br>
        <button type="submit" class="button">Créer le compte</button>
    </form>

    <!-- Boutons de bas de page -->
    <div class="form-toggle">
        <a href="index.php" class="button">⬅ Retour</a>
        <button class="button" id="toggle-button">Créer un compte ✍️</button>
    </div>
</div>

<script>
    const toggleBtn = document.getElementById('toggle-button');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');
    const formTitle = document.getElementById('form-title');

    let showingRegister = <?= $active_form === 'register' ? 'true' : 'false' ?>;

    toggleBtn.addEventListener('click', function (e) {
        e.preventDefault();
        showingRegister = !showingRegister;

        if (showingRegister) {
            formLogin.style.display = 'none';
            formRegister.style.display = 'block';
            formTitle.innerText = 'Créer un compte ✍️';
            toggleBtn.innerText = 'Se connecter 🔐';
        } else {
            formLogin.style.display = 'block';
            formRegister.style.display = 'none';
            formTitle.innerText = 'Connexion 🔐';
            toggleBtn.innerText = 'Créer un compte ✍️';
        }
    });
</script>
</body>
</html>