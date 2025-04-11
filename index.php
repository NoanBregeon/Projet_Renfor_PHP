<?php
session_start();
require_once 'liaison/Bdd.php';
require_once 'liaison/maj_session.php';

$addition = $_SESSION['valid_addition'] ?? 0;
$soustraction = $_SESSION['valid_soustraction'] ?? 0;
$multiplication = $_SESSION['valid_multiplication'] ?? 0;
$division = $_SESSION['valid_division'] ?? 0;

$total_fait = $addition + $soustraction + $multiplication + $division;

// Total attendu : 240 questions (60 par opération)
$total_questions = 240;
$percent_global = ($total_questions > 0) ? min(100, round(($total_fait / $total_questions) * 100)) : 0;

// Couleur dynamique de la barre
function getCouleur($percent) {
    if ($percent >= 100) return "#00c200";
    if ($percent >= 75) return "#19fd52";
    if ($percent >= 50) return "#28a745";
    if ($percent >= 25) return "#5e17eb";
    return "#8e44ad";
}
$couleur = getCouleur($percent_global);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabou Quiz - Bienvenue <?= htmlspecialchars($_SESSION['nom'] ?? '') ?></title>
    <link rel="stylesheet" href="styles/styles.css?v=0">
</head>
<body>
    <div class="contener">
        <?php if (isset($_SESSION['nom'])): ?>
            <div class="header">
                <h1>Bienvenue <?= htmlspecialchars($_SESSION['nom']) ?> !</h1>
            </div>
            <a class="button" id="deconnexion" href="liaison/deconnexion.php">Déconnexion</a>
            <div>
                <img class="logo" src="styles/logo_grenouille.png" alt="logo" title="logo">
            </div>
            <div class="layout">
                <div class="quiz-buttons">
                    <a class="button_lien" href="quiz/quiz.php?type=addition">Addition</a>
                    <a class="button_lien" href="quiz/quiz.php?type=soustraction">Soustraction</a>
                    <a class="button_lien" href="quiz/quiz.php?type=multiplication">Multiplication</a>
                    <a class="button_lien" href="quiz/quiz.php?type=division">Division</a>
                    <?php if ($addition >= 60 && $soustraction >= 60 && $multiplication >= 60 && $division >= 60): ?>
                        <a class="button infini" href="quiz/quiz.php?type=tout&infini=1">infini</a>
                    <?php else: ?>
                        <a class="button bloquer_infini" href="index.php">infini</a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <a class="button_admin" href="admin/dashboard_admin.php">Admin</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="progress-global">
                <div class="barre-texte-verticale">
                    <?= $total_fait ?>/<?= $total_questions ?><br>Progression
                </div>
                <div class="barre-globale-verticale">
                    <div class="barre-globale-remplie-verticale" style="width: <?= $percent_global ?>%; background-color: <?= $couleur ?>;">
                        <?= $percent_global ?>%
                    </div>
                </div>
            </div>
            
        <?php else: ?>
            <h1>Bienvenue</h1>
            <a class="button" id="connexion" href='liaison/connexion.php'>Connexion</a><br>
            <a class="button" id="connexion" href='liaison/creation.php'>Créer un compte</a>
        <?php endif; ?>
    </div>
    <div class="footer"></div>
</body>
</html>
