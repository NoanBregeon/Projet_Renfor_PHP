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
        <div class="header">
            
        </div>
        <?php
            if(isset($_GET["type"]) && !isset($_GET["niv"]) && !isset($_GET["question"]) && !isset($_GET["infini"]) ){
            echo '<h2>Choisi ta difficulté</h2>';
            echo '<div class="choix du niveau">
                <div><a class="button facile" href="quiz.php?type='.$_GET["type"].'&niv=1">Facile<img class="img" src="../styles/cadenas-ouvert.png" alt="debloqué"></a></div>';
                if ($_SESSION[$progression] >= 20){
                    echo '<div><a class="button moyen" href="quiz.php?type='.$_GET["type"].'&niv=2">Moyen<img class="img" src="../styles/cadenas-ouvert.png" alt="debloqué"></a></div>';
                }else{

                    echo '<div><a class="button bloquer moyen" href="quiz.php?type='.$_GET["type"].'">Moyen<img class="img" src="../styles/cadenas.png" alt="bloqué"></a></div>';
                }
                if ($_SESSION[$progression] >= 40){
                    echo '<div><a class="button difficile" href="quiz.php?type='.$_GET["type"].'&niv=3">Difficile<img class="img" src="../styles/cadenas-ouvert.png" alt="debloqué"></a></div>';
                }else{
                    
                    echo '<div><a class="button bloquer difficile" href="quiz.php?type='.$_GET["type"].'">Difficile<img class="img" src="../styles/cadenas.png" alt="bloqué"></a></div>';
                }
                if ($_SESSION[$progression] >= 60){
                    echo '<div><a class="button infini" href="quiz.php?type='.$_GET["type"].'&infini=1">Infini<img class="img" src="../styles/cadenas-ouvert.png" alt="debloqué"></a></div>';
                }else{
                    
                    echo '<div><a class="button bloquer infini" href="quiz.php?type='.$_GET["type"].'">Infini<img class="img" src="../styles/cadenas.png" alt="bloqué"></a></div>';
                }
                
                echo '</div>';
            }
            if(isset($_GET["type"]) && isset($_GET["niv"]) && !isset($_GET["question"])){
                $_SESSION["niv"]=$_GET["niv"];
                include("select_niv.php");
            }elseif(isset($_GET["type"]) && !isset($_GET["niv"]) && isset($_GET["question"])){
                include("niveau.php");
            }
            elseif(isset($_GET["type"]) && !isset($_GET["niv"]) && !isset($_GET["question"]) && isset($_GET["infini"])){
                include("infini.php");
            }
            if(isset($_GET["niv"])){
                echo '<a href="quiz.php?type='.$_GET["type"].'" class="button retour">Retour</a>';
            }elseif(isset($_GET["question"])){
                echo '<a href="quiz.php?type='.$_GET["type"].'&niv='.$_SESSION["niv"].'" class="button retour">Menu</a>';
            }elseif(isset($_GET["infini"])){
                if($_GET["type"]=="tout"){
                    echo '<a href="../index.php" class="button retour">Menu</a>';
                }else{
                    echo '<a href="quiz.php?type='.$_GET["type"].'" class="button retour">Menu</a>';
                }
            }
            else{
                echo '<a href=".." class="button retour">Retour</a>';
            }
                ?>
        <div class="footer"></div>
    </div>
</body>
</html>