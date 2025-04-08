<?php
//Appelle la session
session_start();

?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gabou quiz</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div class="contener">
            <!-- Vérifie si tu es connecté -->
            <?php if(isset($_SESSION['nom'])): ?>
            <!-- Affiche les buttons si connecté -->
            <a class="button" id="deconnexion" href="liaison/deconnexion.php">Déconnexion</a><br>
            <h1>Bienvenue</h1><br>
            <div>
                <a class="button" href="quiz/quiz.php?type=addition">Addition <img src="styles/plus.png" alt="plus" title="plus"></a>
            </div>
            <div>
                <a class="button" href="quiz/quiz.php?type=soustraction">Soustraction <img src="styles/remove.png" alt="plus" title="plus"></a>
            </div>
            <div>
                <a class="button" href="quiz/quiz.php?type=multiplication">Multiplication <img src="styles/multiplication.png" alt="plus" title="plus"></a>
            </div>
            <div>
                <a class="button" href="quiz/quiz.php?type=division">Division <img src="styles/division.png" alt="plus" title="plus"></a>
            </div>
            <?php else: ?>
                <!-- Affiche ce button si pas connecté  -->
                <h1>Bienvenue</h1>
                <div>
                    <a class="button" id="connexion" href="liaison/page_connexion.php">Connexion</a><br>
                </div>
                <?php endif; ?>
        </div>
    </body>
    </html>