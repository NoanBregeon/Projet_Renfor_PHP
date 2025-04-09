<?php
$x=0;
$niveau;
if($_GET["question"]==0){
    header('Location: quiz.php?type=addition&question=1');
}
if (!isset($_GET["reponse"])){
    $niveau=$_GET["question"];
    $_SESSION["niveau"]=$niveau;
}else{
    $niveau=$_SESSION["niveau"];
}
$type=$_GET["type"];
if($niveau-$_SESSION["dificulty"]>21){
    $_SESSION["dificulty"]=$_SESSION["dificulty"]+20;
    if($_SESSION["niv"]<1){
        $_SESSION["niv"]=$_SESSION["niv"]+1;
    }else{
        $_SESSION["niv"]=1;
    }
    
}
if($_SESSION["niv"]==1){$_SESSION["dificulty"]=0;}
elseif($_SESSION["niv"]==2){$_SESSION["dificulty"]=20;}
elseif($_SESSION["niv"]==3){$_SESSION["dificulty"]=40;}
if($niveau>60){
    $type="soustraction";
    $x=60;
    if($niveau==61){
        $_SESSION["dificulty"]=0;
    }
}
if($niveau>120){
    $type="multiplication";
    $x=120;
    if($niveau==121){
        $_SESSION["dificulty"]=0;
    }
}
if($niveau>180){
    $type="division";
    $x=180;
    if($niveau==181){
        $_SESSION["dificulty"]=0;
    }
}
if($niveau>240){
    $type="fin";
}
$x=$x+$_SESSION["dificulty"];


$sql= 'SELECT * FROM questions WHERE id='.$_GET["question"];
$temp = $pdo->query($sql);
$resultats=$temp->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="quiz.php">
        <h2>Question numero : <?php echo $_GET["question"]-$x; ?></h2>
        <div class="calcul_div">
            <p class="calcul_nb1"><?php echo $resultats["nombre1"]; ?></p>
        <p class="img_ope"><?php 
        if($resultats["operation_type"]=="addition"){
            echo '<img class="img" src="../styles/plus.png" alt="">';
        }elseif($resultats["operation_type"]=="soustraction"){
            echo '<img class="img" src="../styles/remove.png" alt="">';
        }elseif($resultats["operation_type"]=="multiplication"){
            echo '<img class="img" src="../styles/multiplication.png" alt="">';
        }elseif($resultats["operation_type"]=="division"){
            echo '<img class="img" src="../styles/division.png" alt="">';
        }
        ?></p>
        <p class="calcul_nb2"><?php echo $resultats["nombre2"]; ?></p>
        <p class="calcul">=</p>
        <input class="barre" type="number" name="reponse" required value=<?php if(isset($_GET["reponse"])){echo '"'.$_GET["reponse"].'"';} ?> >
        <input type="hidden" name="type" value=<?php echo '"'.$type.'"'; ?>>
        <input type="hidden" name="question" value=<?php echo '"'.$niveau.'"'; ?>>
        </div>
        
        <?php
        if (isset($_GET["reponse"])){
            if($_GET["reponse"]==$resultats["correct_answer"]){
                echo '<div class="quiz">Bien joué</div><input type="hidden" name="suivant"><input class="button" type="submit" value="suivant">';
                $_SESSION["niveau"]=$_GET["question"]+1;
                if($_GET["question"]-$x==$_SESSION[$_GET["type"]]){
                    $_SESSION[$_GET["type"]]=$_SESSION[$_GET["type"]]+1;
                    $sql2= 'UPDATE users SET progression_'.$_GET["type"].'='.$_SESSION[$_GET["type"]].' WHERE id='.$_SESSION["user_id"];
                    $pdo->exec($sql2);
                }

            }else{
                echo '<div class="quiz">perdu la bonne reponse attendu est : '.$resultats["correct_answer"].'</div><input type="hidden" name="suivant"><input type="image" src="../styles/smileypascontent.png" class="button" alt="Smiley pas content">';
                $_SESSION["niveau"]=$_GET["question"]-1;   
            }

            if(isset($_GET["suivant"])){
                header('Location: quiz.php?type='.$type.'&question='.$_SESSION["niveau"]);
            }
        }
        ?>
        

    </form>
</body>
</html>