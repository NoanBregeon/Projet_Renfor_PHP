<?php
session_start();
require_once 'liaison/Bdd.php';
require_once 'liaison/maj_session.php';

$addition = $_SESSION['addition'] ?? 0;
$soustraction = $_SESSION['soustraction'] ?? 0;
$multiplication = $_SESSION['multiplication'] ?? 0;
$division = $_SESSION['division'] ?? 0;

$total_fait = $addition + $soustraction + $multiplication + $division;


// Total attendu : 240 questions (60 par opération)
$total_questions = 240;
$percent_global = min(100, round(($total_fait / $total_questions) * 100));

// Couleur dynamique de la barre
$couleur = "#8e44ad";
if ($percent_global >= 25) $couleur = "#5e17eb";
if ($percent_global >= 50) $couleur = "#28a745";
if ($percent_global >= 75) $couleur = "#19fd52";
if ($percent_global == 100) $couleur = "#00c200";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabou quiz</title>
    <link rel="stylesheet" href="styles/styles.css?v=0">
    <style>
    </style>
</head>
<body>
    <div class="contener">
        <?php if (isset($_SESSION['nom'])): ?>
            <div class="header">
                <a class="button" id="deconnexion" href="liaison/deconnexion.php">Déconnexion</a><br>
                <h1>Bienvenue <?= ($_SESSION['nom']) ?> !</h1>
            </div>
            <div>
                <img class="logo" src="styles/logo_grenouille.png" alt="logo" title="logo">
            </div>
            <div class="layout">
                <!-- Colonne gauche : boutons de quiz -->
                <div class="quiz-buttons">
                    <a class="button_lien" href="quiz/quiz.php?type=addition">
                        Addition <img class="img" src="styles/plus.png" alt="plus" title="plus">
                    </a>
                    <a class="button_lien" href="quiz/quiz.php?type=soustraction">
                        Soustraction <img class="img" src="styles/remove.png" alt="soustraction" title="soustraction">
                    </a>
                    <a class="button_lien" href="quiz/quiz.php?type=multiplication">
                        Multiplication <img class="img" src="styles/multiplication.png" alt="multiplication" title="multiplication">
                    </a>
                    <a class="button_lien" href="quiz/quiz.php?type=division">
                        Division <img class="img" src="styles/division.png" alt="division" title="division">
                    </a>
                    <?php if ($_SESSION['addition'] >= 60 && $_SESSION['soustraction'] >= 60 && $_SESSION['multiplication'] >= 60 && $_SESSION['division'] >= 60){
                        echo '<a class="button infini" href="quiz/quiz.php?type=tout&infini=1">infini<img class="img" src="styles/cadenas-ouvert.png" alt=""></a>';
                    }else{
                        
                        echo '<a class="button bloquer infini" href="index.php">infini<img class="img" src="styles/cadenas.png" alt=""></a>';
                    }
                     ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a class="button" href="admin/dashboard_admin.php">Admin</a>
                    <?php endif; ?>
                </div>

                <!-- Colonne droite : barre de progression verticale -->
                <div class="progress-global">
                    <div class="barre-globale-verticale">
                        <div class="barre-globale-remplie-verticale"
                            style="height: <?= $percent_global ?>%; background-color: <?= $couleur ?>;">
                            <?= $percent_global ?>%
                        </div>
                    </div>
                    <div class="barre-texte-verticale">
                        <?= $total_fait ?>/<?= $total_questions ?><br>
                        Progression
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h1>Bienvenue</h1>
            <div>
                <a class="button" id="connexion" href="liaison/connexion_et_creation.php">Connexion</a><br>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['nom'])): ?>
        <div class="footer"></div>
        <?php endif; ?>
    </div>
</body>
</html>
