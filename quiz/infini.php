<?php
session_start();

$type = $_GET['type'] ?? '';
$valid_types = ['addition', 'soustraction', 'multiplication', 'division'];

if (!in_array($type, $valid_types)) {
    echo "<p>❌ Type d'opération invalide.</p>";
    exit;
}

// Initialiser ou réinitialiser si demandé
if (isset($_GET['reset'])) {
    $_SESSION['infini'][$type]['score'] = 0;
    $_SESSION['infini'][$type]['niveau'] = 1;
    header("Location: infini.php?type=" . urlencode($type));
    exit;
}

if (!isset($_SESSION['infini'][$type])) {
    $_SESSION['infini'][$type] = ['score' => 0, 'niveau' => 1];
}

$niveau = $_SESSION['infini'][$type]['niveau'];

// Génération de la question
function generer($type, $niveau) {
    $max = min(10 + $niveau * 2, 100);
    $min = 1;

    do {
        $a = rand($min, $max);
        $b = rand($min, $max);
    } while ($type === 'division' && ($b === 0 || $a % $b !== 0));

    return [$a, $b];
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = (int)$_POST['answer'];
    $a = (int)$_POST['a'];
    $b = (int)$_POST['b'];
    $type = $_POST['type'];

    $correct = match($type) {
        'addition' => $a + $b,
        'soustraction' => $a - $b,
        'multiplication' => $a * $b,
        'division' => (int)($a / $b),
    };

    if ($user_answer === $correct) {
        $_SESSION['infini'][$type]['score']++;
        $_SESSION['infini'][$type]['niveau']++;
        $message = "✅ Bonne réponse !";
    } else {
        $message = "❌ Mauvaise réponse. La bonne réponse était $correct.";
        $_SESSION['infini'][$type]['niveau'] = 1;
    }

    $niveau = $_SESSION['infini'][$type]['niveau'];
}

[$a, $b] = generer($type, $niveau);

$symbol = match($type) {
    'addition' => '+',
    'soustraction' => '-',
    'multiplication' => '×',
    'division' => '÷',
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Infini <?= ucfirst($type) ?></title>
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
    <h1>Mode Infini : <?= ucfirst($type) ?> 🔁</h1>
    <div class="score">Score actuel : <?= $_SESSION['infini'][$type]['score'] ?></div>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <div class="question"><?= "$a $symbol $b = ?" ?></div>
        <input type="hidden" name="a" value="<?= $a ?>">
        <input type="hidden" name="b" value="<?= $b ?>">
        <input type="hidden" name="type" value="<?= $type ?>">
        <input type="number" name="answer" required>
        <br><br>
        <button type="submit" class="button">Valider</button>
    </form>

    <br>
    <a href="infini.php?type=<?= $type ?>&reset=1" class="button">🔄 Réinitialiser</a>
    <a href="quiz.php?type=<?= $type ?>" class="button">⬅ Retour au quiz</a>
</div>
</body>
</html>