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
        <div id="contener">
            <a class="button" id="connexion" href="page_connexion.php">Connexion</a><br>
            <h1>Bienvenue <?php // $_SESSION['nom'] ?></h1><br>
            <a class="button" href="quiz/quiz.php?type=addition">Addition</a>
            <a class="button" href="quiz/quiz.php?type=soustraction">Soustraction</a>
            <a class="button" href="quiz/quiz.php?type=multiplication">Multiplication</a>
            <a class="button" href="quiz/quiz.php?type=division">Division</a>
        </div>
    </body>
    </html>