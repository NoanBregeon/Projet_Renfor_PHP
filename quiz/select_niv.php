<?php
$question=1;
if($_GET["niv"]==1){$dificulty=0;}
elseif($_GET["niv"]==2){$dificulty=20;}
elseif($_GET["niv"]==3){$dificulty=40;}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="flex">
            <?php 
            while ($question<=20){
                if($_SESSION[$_GET["type"]]>=$question+$dificulty){
                    echo ' <a class="question" href="quiz.php?type='.$_GET["type"].'&question=';
                    if($_GET["niv"]==1){echo $question;}
                    elseif($_GET["niv"]==2){echo $question+20;}
                    elseif($_GET["niv"]==3){echo $question+40;}
                    echo'">';
                }
                
                
                echo '<div class="button';
                if($_SESSION[$_GET["type"]]<$question+$dificulty){echo " bloquer";}
                echo'">';
                echo $question.'</div></a>';
                
                $question=$question+1;
            }
            ?>
        </div>
        
    </body>
    </html>