<?php
session_start();

// Initialisation du score et du niveau si nécessaire
if (!isset($_SESSION['infini_score'])) {
    $_SESSION['infini_score'] = 0;
    $_SESSION['infini_step'] = 1;
}

// Génération de la question
function genererQuestion($niveau) {
    $operation = ['+', '-', '×', '÷'][rand(0, 3)];

    // Ajuster la difficulté selon le niveau
    $max = min(10 + $niveau * 2, 100); // niveau max 100
    $min = 1;

    do {
        $a = rand($min, $max);
        $b = rand($min, $max);
    } while ($operation === '÷' && ($b === 0 || $a % $b !== 0)); // pour division entière

    return compact('a', 'b', 'operation');
}

// Vérification de la réponse
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = (int)$_POST['answer'];
    $a = (int)$_POST['a'];
    $b = (int)$_POST['b'];
    $operation = $_POST['operation'];

    $correct = match($operation) {
        '+' => $a + $b,
        '-' => $a - $b,
        '×' => $a * $b,
        '÷' => (int)($a / $b),
    };

    if ($user_answer === $correct) {
        $_SESSION['infini_score']++;
        $_SESSION['infini_step']++;
        $message = "✅ Bonne réponse !";
    } else {
        $message = "❌ Mauvaise réponse. La bonne réponse était $correct.";
        $_SESSION['infini_step'] = 1; // reset
    }
}

$niveau_actuel = (int)$_SESSION['infini_step'];
$question = genererQuestion($niveau_actuel);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz Infini</title>
    <link rel="stylesheet" href="../layout/styles.css">
    <style>
        .infini-container {
            text-align: center;
            margin-top: 40px;
        }

        .question {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type="number"] {
            font-size: 20px;
            padding: 10px;
            width: 100px;
        }

        .score {
            font-size: 20px;
            margin-bottom: 15px;
            color: #5e17eb;
        }
    </style>
</head>
<body>
<div class="infini-container">
    <h1>Mode Infini 🔁</h1>
    <div class="score">Score actuel : <?= $_SESSION['infini_score'] ?></div>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <div class="question"><?= $question['a'] . ' ' . $question['operation'] . ' ' . $question['b'] ?> = ?</div>
        <input type="hidden" name="a" value="<?= $question['a'] ?>">
        <input type="hidden" name="b" value="<?= $question['b'] ?>">
        <input type="hidden" name="operation" value="<?= $question['operation'] ?>">
        <input type="number" name="answer" required>
        <br><br>
        <button type="submit" class="button">Valider</button>
    </form>

    <br>
    <a href="reset_infini.php" class="button">🔄 Réinitialiser</a>
    <a href="../index.php" class="button">⬅ Retour</a>
</div>
</body>
</html>