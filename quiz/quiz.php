<?php
session_start();
$progression=$_GET["type"]
$_SESSION[]
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
                <a class="button" href="quiz.php?type='.$_GET["type"].'&niv=1">facile</a><br><br>
                <a class="button" href="quiz.php?type='.$_GET["type"];
                if ($_SESSION[$progression]>=10){
                    echo '&niv=2">moyen</a><br><br>';
                }else
                    echo '" class="bloquer" >moyen</a><br><br>';

            //     <a class="button" href="quiz.php?type='.$_GET["type"].'&niv=3">difficile</a> 
            // </div>';
        }else


        ?>
    </div>
</body>
</html>