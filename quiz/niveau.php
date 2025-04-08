<?php
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
if($niveau>60){
    $type="soustraction";
}
if($niveau>120){
    $type="multiplication";
}
if($niveau>180){
    $type="division";
}
if($niveau>240){
    $type="fin";
}


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
        <h2>question numero : <?php echo $_GET["question"]-$_SESSION["dificulty"] ?></h2>
        <p><?php echo $resultats["nombre1"]; ?> </p>
        <p><?php 
        if($resultats["operation_type"]=="addition"){
            echo "+";
        }elseif($resultats["operation_type"]=="soustraction"){
            echo "-";
        }elseif($resultats["operation_type"]=="multiplication"){
            echo "X";
        }elseif($resultats["operation_type"]=="division"){
            echo "%";
        }
        ?></p>
        <P><?php echo $resultats["nombre2"]; ?></P>
        <p>=</p>
        <input type="number" name="reponse" required value=<?php if(isset($_GET["reponse"])){echo '"'.$_GET["reponse"].'"';} ?> >
        <input type="hidden" name="type" value=<?php echo '"'.$type.'"'; ?>>
        <input type="hidden" name="question" value=<?php echo '"'.$niveau.'"'; ?>>
        <?php
        if (isset($_GET["reponse"])){
            if($_GET["reponse"]==$resultats["correct_answer"]){
                echo '<div class="quiz">bien jouer</div><input type="hidden" name="suivant"><input class="button" type="submit" value="suivant">';
                $_SESSION["niveau"]=$_GET["question"]+1;

            }else{
                echo '<div class="quiz">erreur la bonne reponse attendu est : '.$resultats["correct_answer"].'</div><input type="hidden" name="suivant"><input class="button" type="submit" value=":(">';
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