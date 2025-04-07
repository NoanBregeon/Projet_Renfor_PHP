<?php
require_once 'liaison\Bdd.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = new PDO('username', 'password');


    if ($email === 'admin@site.com' && $password === 'admin') {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Identifiants incorrects.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\styles\styles.css">
</head>
<body>
<form method="POST">
    <h2>Connexion Admin</h2>
    <input type="text" name="email" placeholder="Email admin" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php if (isset($error)) echo '<p style="color:red">'.$error.'</p>'; ?>

    
</body>
</html>