<?php
session_start();
require_once 'liaison/Bdd.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403); // Accès interdit
    echo "Utilisateur non connecté.";
    exit;
}

$user_id = $_SESSION['user_id'];

// On récupère les données actuelles dans la BDD
$stmt = $pdo->prepare("SELECT * FROM progression WHERE id_pseudo = ?");
$stmt->execute([$user_id]);
$progression = $stmt->fetch();

if ($progression) {
    $_SESSION['addition'] = $progression['progression_addition'];
    $_SESSION['soustraction'] = $progression['progression_soustraction'];
    $_SESSION['multiplication'] = $progression['progression_multiplication'];
    $_SESSION['division'] = $progression['progression_division'];

    echo "✅ Session mise à jour.";
} else {
    echo "❌ Aucun enregistrement de progression trouvé.";
}
