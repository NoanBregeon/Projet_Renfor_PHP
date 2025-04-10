<?php
session_start();
include("Bdd.php");
$connection="non";
$x=0;
if(isset($_POST["validation"])){
    $sql1= 'SELECT * FROM users';
    $temp1 = $pdo->query($sql1);
    while($resultats1 = $temp1->fetch()) {
        if($resultats1["username"]==$_POST["nom"]){
        $x=$x+1;
    }

    }
    if($x==0){
        if($_POST["mdp"]==$_POST["confirmMdp"]){
            $sql3= 'INSERT INTO users (username, password, roles, progression_addition, progression_soustraction, progression_division, progression_multiplication) VALUES ("'.$_POST["nom"].'", "'.$_POST["mdp"].'", "user", 1, 1, 1, 1)';
            $pdo->exec($sql3);

            $sql1= 'SELECT * FROM users';
            $temp1 = $pdo->query($sql1);
            while($resultats1 = $temp1->fetch()) {
                if($resultats1["username"]==$_POST["nom"] && $resultats1["password"]==$_POST["mdp"]){
                    $connection="ok";
                    $_SESSION["user_id"]=$resultats1["id"];
                    require_once 'maj_session.php';
                    header("Location: ../index.php");
                }
            }
        }else{
            echo "mdp != confirmation";
        }
    }else{
        echo "ca existe deja";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gabou quiz</title>
</head>
<body>
    <div class="header"></div>
    <form action="" method="post">
        <input type="hidden" name="validation">
        <input type="text" name="nom" required>
        <input type="password" name="mdp" id="" required>
        <input type="password" name="confirmMdp" id="" required>
        <input type="submit" value="crée">
    </form>
    <a href="connexionSansChatGPT.php">ce connecter</a>
    <a href="../index.php">retour</a>
    <div class="footer"></div>
</body>
</html>