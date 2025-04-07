<?php
$question=1;
    if($_GET["type"]=="addition"){
        if($_GET["niv"]==1) :
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
                if($_SESSION["addition"]<$question){echo " bloquer";}
                echo'">'.$question.'</div>';
                $question=$question+1;
            }
            ?>
        </div>
        
    </body>
    </html>
<?php endif; }?>