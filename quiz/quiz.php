<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gabou quiz</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="contener">
        <?php
            if(isset($_GET["type"]) && !isset($_GET["difficulty"]))
            echo '<div class="choix du niveau">
                <a class="button" href="quiz.php?niv=1">facile</a><br><br>
                <a class="button" href="quiz.php?niv=2">moyen</a><br><br>
                <a class="button" href="quiz.php?niv=3">difficile</a> 
            </div>';
        ?>
    </div>
</body>
</html>