<?php
session_start();
include("Bdd.php");
$connection="non";
$erreur="";
if(isset($_POST["validation"])){
    $sql1= 'SELECT * FROM users WHERE username="'.$_POST["nom"].'" AND password="'.$_POST["mdp"].'"';
    $temp1 = $pdo->query($sql1);
    $resultats1 = $temp1->fetch();
    if( isset($resultats1["username"]) &&  isset($resultats1["password"])){
        $connection="ok";
        $_SESSION["user_id"]=$resultats1["id"];
        require_once 'maj_session.php';
        header("Location: ../index.php");
    }else{
        $erreur=1;
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
        <h1 class="connexion-title">Connexion</h1>
        <div class="connexion-form">
            <form action="" method="post">
                <input type="hidden" name="validation">
                
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" id="nom" required>
                
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
                <?php
                if($erreur==1){
                echo "identifiant ou mots de passe incorrect";
                }   
                ?>
                <input type="submit" class="button_connexion" value="Se connecter">
            </form>
        </div>
        <div class="form-toggle">
            <a href="creation.php" class="button_form">Créer un compte</a>
        </div>
        <div class="form-toggle">
            <a href="../index.php" class="button_form">Retour</a>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>