<?php
$niveau=$_GET["question"]+1;
if($niveau>21){
    $_SESSION["dificulty"]=20;
    $_SESSION["niv"]=2;
}
if($niveau>41){
    $_SESSION["dificulty"]=40;
    $_SESSION["niv"]=3;
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
    <form action="quiz.php">
        <h2>question numero : <?php echo $_GET["question"]-$_SESSION["dificulty"] ?></h2>
        <p>445</p>
        <p>+</p>
        <P>eulizsh</P>
        <p>=</p>
        <input type="number">
        <input type="hidden" name="type" value=<?php echo '"'.$_GET["type"].'"'; ?>>
        <input type="hidden" name="question" value=<?php echo '"'.$niveau.'"'; ?>>
        <input type="submit" value="suivant">
        

    </form>
</body>
</html>