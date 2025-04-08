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
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        .layout {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 60px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .quiz-buttons {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .progress-global {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .barre-globale-verticale {
            width: 40px;
            height: 250px;
            background-color: #e0e0e0;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 3px 5px #ffde59;
            display: flex;
            flex-direction: column-reverse; /* Important pour remplissage de bas en haut */
        }   

        .barre-globale-remplie-verticale {
            width: 100%;
            transition: height 0.5s ease;
            background-color: #5e17eb;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            color: white;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 5px;
            margin: 0;
        }


        .barre-texte-verticale {
            font-weight: bold;
            text-align: center;
        }
        .button{
            margin: 0px 0;
        }
    </style>
</head>
<body>
    <div class="contener">
        <?php if (isset($_SESSION['nom'])): ?>
            <a class="button" id="deconnexion" href="liaison/deconnexion.php">Déconnexion</a><br>
            <h1>Bienvenue <?= htmlspecialchars($_SESSION['nom']) ?> !</h1>

            <div class="layout">
                <!-- Colonne gauche : boutons de quiz -->
                <div class="quiz-buttons">
                    <a class="button" href="quiz/quiz.php?type=addition">
                        Addition <img src="styles/plus.png" alt="plus" title="plus">
                    </a>
                    <a class="button" href="quiz/quiz.php?type=soustraction">
                        Soustraction <img src="styles/remove.png" alt="soustraction" title="soustraction">
                    </a>
                    <a class="button" href="quiz/quiz.php?type=multiplication">
                        Multiplication <img src="styles/multiplication.png" alt="multiplication" title="multiplication">
                    </a>
                    <a class="button" href="quiz/quiz.php?type=division">
                        Division <img src="styles/division.png" alt="division" title="division">
                    </a>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a class="button" href="dashboard_admin.php">Admin</a>
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
                <a class="button" id="connexion" href="liaison/page_connexion.php">Connexion</a><br>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
