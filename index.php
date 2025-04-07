<?php

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
            <?php if(isset($_SESSION['id_user'])): ?>
            <a class="button" id="connexion" href="page_connexion.php">Connexion</a><br>
            
            <h1>Bienvenue <?php // $_SESSION['nom'] ?></h1><br>
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
                <h1>Bienvenue</h1>
                <div>
                <a class="button pasco" id="connexion" href="page_connexion.php">Connexion</a>
                </div>
                <?php endif; ?>
        </div>
    </body>
    </html>