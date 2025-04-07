<?php
session_start();
$progression=$_GET["type"];
$_SESSION[$progression]=40;
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
                <div><a class="button facile" href="quiz.php?type='.$_GET["type"].'&niv=1">facile</a></div>';
                if ($_SESSION[$progression] >= 20){
                    echo '<div><a class="button moyen" href="quiz.php?type='.$_GET["type"].'&niv=2">moyen</a></div>';
                }else{

                    echo '<div><a class="button bloquer moyen" href="quiz.php?type='.$_GET["type"].'">moyen</a></div>';
                }
                if ($_SESSION[$progression] >= 40){
                    echo '<div><a class="button difficil" href="quiz.php?type='.$_GET["type"].'&niv=3">difficile</a></div>';
                }else{
                    
                    echo '<div><a class="button bloquer difficil" href="quiz.php?type='.$_GET["type"].'">difficile</a></div>';
                }
                
                echo '</div>';
            }
                
                
                ?>
                <a href=".." class="button">retour</a>
    </div>
</body>
</html>