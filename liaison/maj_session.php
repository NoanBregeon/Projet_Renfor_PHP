<?php
if (!isset($pdo)) {
    require_once 'Bdd.php'; // On s'assure d'avoir la connexion si pas encore incluse
}

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    return; // Pas connecté ? Rien à faire
}

$user_id = $_SESSION['user_id'];

// On récupère les données de l'utilisateur depuis la table `users`
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user) {
    $_SESSION['nom'] = $user['username'];
    $_SESSION['role'] = $user['roles'];
    $_SESSION['addition'] = $user['progression_addition'];
    $_SESSION['soustraction'] = $user['progression_soustraction'];
    $_SESSION['multiplication'] = $user['progression_multiplication'];
    $_SESSION['division'] = $user['progression_division'];
}
?>
