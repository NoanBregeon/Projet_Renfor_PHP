<?php
require_once 'liaison\Bdd.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudomail = $_POST['pseudo'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare('SELECT * FROM users WHERE pseudomail = :pseudomail');
    $stmt->execute(['pseudomail' => $pseudomail]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Identifiant ou mot de passe incorrect.';
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
    <input type="text" name="pseudo" placeholder="Identifiant" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php if (isset($error)) echo '<p style="color:red">'.$error.'</p>'; ?>

    
</body>
</html>