<?php
session_start();
require_once '../liaison/Bdd.php';
require_once '../liaison/maj_session.php';

// Sécurité : vérifier si l'utilisateur est bien admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Récupération de tous les utilisateurs sauf les admins
$stmt = $pdo->prepare("SELECT username, valid_addition, valid_soustraction, valid_multiplication, valid_division 
FROM users WHERE roles != 'admin'");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="header"></div>

    <div class="dashboard-container">
        <h1 class="dashboard-title">Dashboard Admin – Suivi des élèves</h1>

        <table>
            <thead>
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>Addition</th>
                    <th>Soustraction</th>
                    <th>Multiplication</th>
                    <th>Division</th>
                    <th>Total</th>
                    <th>Progression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): 
                    $total = $u['valid_addition'] + $u['valid_soustraction'] + $u['valid_multiplication'] + $u['valid_division'];
                    $pourcentage = ($total > 0) ? round(($total / 240) * 100) : 0;
                ?>
                <tr>
                    <td class="dash_td"><?= htmlspecialchars($u['username']) ?></td>
                    <td class="dash_td"><?= $u['valid_addition'] ?>/60</td>
                    <td class="dash_td"><?= $u['valid_soustraction'] ?>/60</td>
                    <td class="dash_td"><?= $u['valid_multiplication'] ?>/60</td>
                    <td class="dash_td"><?= $u['valid_division'] ?>/60</td>
                    <td class="total-cell"><?= $total ?>/240</td>
                    <td>
                        <div class="progression-bar" aria-label="Progression de <?= htmlspecialchars($u['username']) ?>">
                            <div class="barre-globale-remplie-verticale" style="width: <?= $pourcentage ?>%; height: 100%;"></div>
                        </div>
                        <span class="percent-cell"><?= $pourcentage ?>%</span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a class="retour-dashboard" href="../index.php">Accueil</a>
    </div>

    <div class="footer"></div>
</body>
</html>