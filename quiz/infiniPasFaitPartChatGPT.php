<?php
if(!isset($_SESSION["streak"])){
    $_SESSION["streak"]=0;
}
if(!isset($_GET["reponse"])){
    $type=["addition", "soustraction", "division", "multiplication"];
    $x=rand(0,3);
    if($_GET["type"]=="tout"){
        $_SESSION["typeinfini"]=$type[$x];
        $_SESSION["reset"]="tout";
    }else{
        $_SESSION["typeinfini"]=$_GET["type"];
        $_SESSION["reset"]=$_GET["type"];
    }


    if($_SESSION["typeinfini"]=="addition"){
        $_SESSION["nombre1"]=rand(1, 200);
        $_SESSION["nombre2"]=rand(1, 200);
        $_SESSION["resultatinfini"]=$_SESSION["nombre1"]+$_SESSION["nombre2"];
    }
    if($_SESSION["typeinfini"]=="soustraction"){
        $_SESSION["nombre1"]=rand(100, 200);
        $_SESSION["nombre2"]=rand(1, 100);
        $_SESSION["resultatinfini"]=$_SESSION["nombre1"]-$_SESSION["nombre2"];
    }
    if($_SESSION["typeinfini"]=="division"){
        $_SESSION["nombre1"]=rand(100, 200);
        $_SESSION["nombre2"]=rand(1, 100);
        while($_SESSION["nombre1"]%$_SESSION["nombre2"] != 0){
            $_SESSION["nombre1"]=rand(50, 100);
            $_SESSION["nombre2"]=rand(1, 50);
        }
        $_SESSION["resultatinfini"]=intdiv($_SESSION["nombre1"], $_SESSION["nombre2"]);
    }
    if($_SESSION["typeinfini"]=="multiplication"){
        $_SESSION["nombre1"]=rand(1, 12);
        $_SESSION["nombre2"]=rand(1, 12);
        $_SESSION["resultatinfini"]=$_SESSION["nombre1"]*$_SESSION["nombre2"];
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Mode Infini</h2>
    <div class="container">
    <?php if($_GET["type"]=="tout"): ?>
        <div class="classement">
            <h4>Classement</h4>
            <div class="grid_classement">
                <?php
                $sql1= 'SELECT * FROM users WHERE roles="user" ORDER BY streak LIMIT 3';
                $temp1 = $pdo->query($sql1);
                $position = 1;

                while($resultats1 = $temp1->fetch()) {
                    $trophyImg = "";
                    if ($position == 1) {
                        $trophyImg = '<img src="../styles/trophy-gold.png" alt="1" class="trophy-icon">';
                    } elseif ($position == 2) {
                        $trophyImg = '<img src="../styles/trophy-silver.png" alt="2" class="trophy-icon">';
                    } elseif ($position == 3) {
                        $trophyImg = '<img src="../styles/trophy-bronze.png" alt="3" class="trophy-icon">';
                    }
                    echo '<div class="div_classement">';
                    echo $trophyImg;
                    echo '<p class="classement_user">' . $resultats1["username"] . "</p>";
                    echo '<p>:</p>';
                    '<p class="classement_streak">' . $resultats1["streak"] . "</p>";
                    echo "</div></br>";
                    $position++;
                }
            ?>
            </div>
            
        </div>
    <?php endif ?>
    <form class="grid_quiz" action="quiz.php">
        <div class="calcul_div">
            <p class="calcul"><?php echo $_SESSION["nombre1"]; ?></p>
        <p><?php 
        if( $_SESSION["typeinfini"]=="addition"){
            echo '<img class="img" src="../styles/plus.png" alt="">';
        }elseif( $_SESSION["typeinfini"]=="soustraction"){
            echo '<img class="img" src="../styles/remove.png" alt="">';
        }elseif( $_SESSION["typeinfini"]=="multiplication"){
            echo '<img class="img" src="../styles/multiplication.png" alt="">';
        }elseif( $_SESSION["typeinfini"]=="division"){
            echo '<img class="img" src="../styles/division.png" alt="">';
        }
        ?></p>
        <p class="calcul"><?php echo $_SESSION["nombre2"]; ?></p>
        <p class="calcul">=</p>
        <input class="barre" type="number" name="reponse" required value=<?php if(isset($_GET["reponse"])){echo '"'.$_GET["reponse"].'"';} ?> >
        <input type="hidden" name="type" value=<?php echo '"'.$_SESSION["typeinfini"].'"'; ?>>
        <input type="hidden" name="infini" value=1>
        </div>
        <?php
        if (isset($_GET["reponse"])){
            if($_GET["reponse"]==$_SESSION["resultatinfini"]){
                echo '<div class="quiz">Bien joué</div><input type="hidden" name="suivant"><input class="button" type="submit" value="suivant">';
            }else{
                echo '<div class="quiz">Perdu la bonne reponse attendu est : '.$_SESSION["resultatinfini"].'</div><input type="hidden" name="suivant"><input type="image" src="../styles/smileypascontent.png" class="button" alt="Smiley pas content">';
            }
            
            if(isset($_GET["suivant"])){
                header('Location: quiz.php?type='.$_SESSION["reset"].'&infini=1');
                if($_GET["reponse"]==$_SESSION["resultatinfini"]){
                    $_SESSION["streak"]=$_SESSION["streak"]+1;

                }else{
                    $_SESSION["streak"]=0;

                }
            }
        }
        ?>
    </form>
    <?php if($_GET["type"]=="tout"): ?>
    <div class="streak">
        <h4>Chaine !</h4>
        <?php
        $streakClass = "streak-lvl1";
        if($_SESSION["streak"] >= 1 && $_SESSION["streak"] < 5) {
            $streakClass = "streak-lvl2";
        } elseif($_SESSION["streak"] >= 5 && $_SESSION["streak"] < 10) {
            $streakClass = "streak-lvl3";
        } elseif($_SESSION["streak"] >= 10 && $_SESSION["streak"] < 15) {
            $streakClass = "streak-lvl4";
        } elseif($_SESSION["streak"] >= 15 && $_SESSION["streak"] < 20) {
            $streakClass = "streak-lvl5";
        } elseif($_SESSION["streak"] >= 20) {
            $streakClass = "streak-lvl6";
        }
        echo '<p class="p_streak '.$streakClass.'">'.$_SESSION["streak"]."</p>";
        $sql2= 'SELECT streak FROM users WHERE id='.$_SESSION["user_id"];
        $temp2 = $pdo->query($sql2);
        $resultats2=$temp2->fetch();
        if($resultats2["streak"] < $_SESSION["streak"]){
            $sql3= 'UPDATE users SET streak='.$_SESSION["streak"].' WHERE id='.$_SESSION["user_id"];
            $pdo->exec($sql3);
        }
        ?>
    </div>
    </div>
    <?php endif ?>
</body>
</html>