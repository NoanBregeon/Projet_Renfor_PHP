<?php
session_start();
require_once 'liaison/Bdd.php';
require_once 'liaison/maj_session.php';

// Sécurité : vérifier si l'utilisateur est bien admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Récupération de tous les utilisateurs sauf les admins
$stmt = $pdo->prepare("SELECT username, progression_addition, progression_soustraction, progression_multiplication, progression_division 
                       FROM users 
                       WHERE role != 'admin'");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px #ccc;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #5e17eb;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        .retour {
            display: block;
            width: fit-content;
            margin: 20px auto;
            background-color: #ff88dc;
            color: #5e17eb;
            border: 3px solid #ffde59;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Dashboard Admin – Suivi des élèves</h1>

    <table>
        <thead>
            <tr>
                <th>Nom d’utilisateur</th>
                <th>Addition</th>
                <th>Soustraction</th>
                <th>Multiplication</th>
                <th>Division</th>
                <th>Total</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): 
                $total = $u['progression_addition'] + $u['progression_soustraction'] + $u['progression_multiplication'] + $u['progression_division'];
                $pourcentage = round(($total / 240) * 100);
            ?>
            <tr>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= $u['progression_addition'] ?>/60</td>
                <td><?= $u['progression_soustraction'] ?>/60</td>
                <td><?= $u['progression_multiplication'] ?>/60</td>
                <td><?= $u['progression_division'] ?>/60</td>
                <td><?= $total ?>/240</td>
                <td><?= $pourcentage ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a class="retour" href="../index.php">⬅ Retour à l'accueil</a>
</body>
</html>
