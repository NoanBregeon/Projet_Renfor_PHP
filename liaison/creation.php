<?php
session_start();
include("Bdd.php");
$connection="non";
if(isset($_POST["validation"])){
    $sql1= 'SELECT * FROM users WHERE username="'.$_POST["nom"].'"';
    $temp1 = $pdo->query($sql1);
    $resultats1 = $temp1->fetch();
    if(!isset($resultats1["username"])){
        if($_POST["mdp"]==$_POST["confirmMdp"]){
            $sql3= 'INSERT INTO users (username, password, roles, progression_addition, progression_soustraction, progression_division, progression_multiplication) VALUES ("'.$_POST["nom"].'", "'.$_POST["mdp"].'", "user", 1, 1, 1, 1)';
            $pdo->exec($sql3);
            $sql1= 'SELECT * FROM users WHERE username="'.$_POST["nom"].'" AND password="'.$_POST["mdp"].'"';
            $temp1 = $pdo->query($sql1);
            $resultats1 = $temp1->fetch();
            if( isset($resultats1["username"]) &&  isset($resultats1["password"])){
                $connection="ok";
                $_SESSION["user_id"]=$resultats1["id"];
                require_once 'maj_session.php';
                header("Location: ../index.php");
            }
        }else{
            echo "mdp != confirmation";
        }
    }else{
        echo '<p class="user_util">Cet utilisateur existe déjà</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gabou quiz</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="header"></div>
    <div class="connexion-container">
        <h1 class="connexion-title">Créer un compte</h1>
        <div class="connexion-form">
            <form action="" method="post">
            <input type="hidden" name="validation">
            <label for="nom">Nom d'utilisateur</label>
            <input type="text" name="nom" id="nom" required>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" required>
            <label for="confirmMdp">Confirme mot de passe</label>
            <input type="password" name="confirmMdp" id="mdp" required>
            <input type="submit" class="button_connexion" value="Créer">
            </form>
        </div>
    <div class="form-toggle">
        <a href="connexion.php" class="button_form">Se connecter</a>
    </div>
    <div class="form-toggle">
        <a href="../index.php" class="button_form">Retour</a>
    </div>
    </div>
    
    <div class="footer"></div>
</body>
</html>