<?php
session_start();
$progression=$_GET["type"];
$_SESSION[$progression]=0;
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
            if(isset($_GET["type"]) && !isset($_GET["niv"])){
            echo '<div class="choix du niveau">
                <a class="button" href="quiz.php?type='.$_GET["type"].'&niv=1">facile</a><br><br>';
                if ($_SESSION[$progression] >= 20){
                    echo '<a class="button" href="quiz.php?type='.$_GET["type"].'&niv=2">moyen</a><br><br>';
                }else{

                    echo '<a class="button bloquer" href="quiz.php?type='.$_GET["type"].'">moyen</a><br><br>';
                }
                if ($_SESSION[$progression] >= 40){
                    echo '<a class="button" href="quiz.php?type='.$_GET["type"].'&niv=3">difficile</a><br><br>';
                }else{
                    
                    echo '<a class="button bloquer" href="quiz.php?type='.$_GET["type"].'">difficile</a><br><br>';
                }
                
                echo '</div>';
            }
                
                
                ?>
    </div>
</body>
</html>