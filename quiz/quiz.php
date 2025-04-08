<?php
session_start();
$progression=$_GET["type"];
include("../liaison/maj_session.php")
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gabou quiz</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../styles/styles.css?v=0">
</head>
<body>
    <div class="contener">
        <?php
            if(isset($_GET["type"]) && !isset($_GET["niv"]) && !isset($_GET["question"])){
            echo '<h2>Choisi ta difficulté</h2>';
            echo '<div class="choix du niveau">
                <div><a class="button facile" href="quiz.php?type='.$_GET["type"].'&niv=1">facile<img src="../styles/cadenas-ouvert.png" alt=""></a></div>';
                if ($_SESSION[$progression] >= 20){
                    echo '<div><a class="button moyen" href="quiz.php?type='.$_GET["type"].'&niv=2">moyen<img src="../styles/cadenas-ouvert.png" alt=""></a></div>';
                }else{

                    echo '<div><a class="button bloquer moyen" href="quiz.php?type='.$_GET["type"].'">moyen<img src="../styles/cadenas.png" alt=""></a></div>';
                }
                if ($_SESSION[$progression] >= 40){
                    echo '<div><a class="button difficile" href="quiz.php?type='.$_GET["type"].'&niv=3">difficile<img src="../styles/cadenas-ouvert.png" alt=""></a></div>';
                }else{
                    
                    echo '<div><a class="button bloquer difficile" href="quiz.php?type='.$_GET["type"].'">difficile<img src="../styles/cadenas.png" alt=""></a></div>';
                }
                
                echo '</div>';
            }
            if(isset($_GET["type"]) && isset($_GET["niv"]) && !isset($_GET["question"])){
                include("select_niv.php");
            }elseif(isset($_GET["type"]) && !isset($_GET["niv"]) && isset($_GET["question"])){
                include("niveau.php");
            }
            if(isset($_GET["niv"])){
                echo '<a href="quiz.php?type='.$_GET["type"].'" class="button retour">retour</a>';
            }elseif(isset($_GET["question"])){
                echo '<a href="quiz.php?type='.$_GET["type"].'&niv='.$_SESSION["niv"].'" class="button retour">menus</a>';
            }else{
                echo '<a href=".." class="button retour">retour</a>';
            }
                ?>
    </div>
</body>
</html>