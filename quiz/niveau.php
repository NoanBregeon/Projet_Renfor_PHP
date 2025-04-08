<?php
$niveau=$_GET["question"];
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
        <input type="number" name="reponse" required >
        <input type="hidden" name="type" value=<?php echo '"'.$type.'"'; ?>>
        <input type="hidden" name="question" value=<?php echo '"'.$niveau.'"'; ?>>
        
        <input type="submit" value="suivant">
        

    </form>
</body>
</html>