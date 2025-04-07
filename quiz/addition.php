<?php
$question=1;

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
                echo '<div class="button';
                if($_SESSION[$_GET["type"]]<$question){echo " bloquer";}
                echo'">';
                if($_SESSION[$_GET["type"]]>=$question){
                    echo ' <a href="quiz.php?type='.$_GET["type"].'&question=';
                    if($_GET["niv"]==1){echo $question;}
                    elseif($_GET["niv"]==2){echo $question+20;}
                    elseif($_GET["niv"]==3){echo $question+40;}
                    echo'">';
            
            }
                echo $question.'</a></div>';
                $question=$question+1;
            }
            ?>
        </div>
        
    </body>
    </html>