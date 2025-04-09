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
    <form action="quiz.php">
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
                echo '<div class="quiz">bien jouer</div><input type="hidden" name="suivant"><input class="button" type="submit" value="suivant">';
            }else{
                echo '<div class="quiz">perdu la bonne reponse attendu est : '.$_SESSION["resultatinfini"].'</div><input type="hidden" name="suivant"><input type="image" src="../styles/smileypascontent.png" class="button" alt="Smiley pas content">';
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
    <div class="streak">
        <h4>chaine !</h4>
        <?php
        echo "<p>".$_SESSION["streak"]."</p>";
        ?>
    </div>
    <div class="classement">
        <h4>classement</h4>
        <?php
            $sql1= 'SELECT * FROM users WHERE roles="user" ORDER BY streak';
            $temp1 = $pdo->query($sql1);

            while($resultats1=$temp1->fetch()){
                echo "<div>"."<p>".$resultats1["username"]."</p>"."<p>".$resultats1["streak"]."</p>"."</div>"."</br>";
            }
        ?>
    </div>
</body>
</html>