<?php
$question=1;
$_SESSION["niv"]=$_GET["niv"];
if($_GET["niv"]==1){$_SESSION["dificulty"]=0;}
elseif($_GET["niv"]==2){$_SESSION["dificulty"]=20;}
elseif($_GET["niv"]==3){$_SESSION["dificulty"]=40;}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>choisi ton niveau</h2>
        <div class="flex">
            <?php 
            while ($question<=20){
                if($_SESSION[$_GET["type"]]>=$question+$_SESSION["dificulty"]){
                    echo ' <a class="question" href="quiz.php?type='.$_GET["type"].'&question=';
                    if($_GET["niv"]==1){echo $question;}
                    elseif($_GET["niv"]==2){echo $question+20;}
                    elseif($_GET["niv"]==3){echo $question+40;}
                    echo'">';
                }
                
                
                echo '<div class="button';
                if($_SESSION[$_GET["type"]]<$question+$_SESSION["dificulty"]){echo " bloquer";}
                echo'">';
                echo $question.'</div></a>';
                
                $question=$question+1;
            }
            ?>
        </div>
        
    </body>
    </html>