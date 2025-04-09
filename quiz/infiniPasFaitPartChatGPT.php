<?php
if(!isset($_GET["reponse"])){
    $_SESSION["typeinfini"]=$_GET["type"];
    $_SESSION["resultatinfini"];
    $_SESSION["nombre1"]=rand(1, 200);
    $_SESSION["nombre2"]=rand(1, 200);;
    if($_SESSION["typeinfini"]=="addition"){
        $_SESSION["resultatinfini"]=$_SESSION["nombre1"]+$_SESSION["nombre2"];
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
                echo '<div class="quiz">perdu la bonne reponse attendu est : '.$_SESSION["resultatinfini"].'</div><input type="hidden" name="suivant"><input class="button" type="submit" value=":(">';
            }

            if(isset($_GET["suivant"])){
                header('Location: quiz.php?type='.$_SESSION["typeinfini"].'&infini=1');
            }
        }
        ?>
        

    </form>
</body>
</html>