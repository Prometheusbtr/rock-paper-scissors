<?php
$choices      = ['rock','paper','scissors'];           // these are the 3 moves
$emoji        = ['rock'=>'🪨','paper'=>'📄','scissors'=>'✂️']; // icons for each move
$winMap       = ['rock'=>'scissors','paper'=>'rock','scissors'=>'paper']; // who each beats
$result       = '';                                   // will show who won
$playerChoice = '';                                   // what the player picks
$computerChoice = '';                                 // what the computer picks

// check if form was sent
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerChoice   = $_POST['choice'];               // get player pick
    $computerChoice = $choices[array_rand($choices)]; // pick computer move

    // decide result
    if ($playerChoice === $computerChoice) {
        $result = "It's a tie!";
    } elseif ($winMap[$playerChoice] === $computerChoice) {
        $result = "You win!";
    } else {
        $result = "Computer wins!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Paper Scissors</title>
    <link rel="stylesheet" href="style.css"> <!-- connect styles -->
</head>
<body>
    <h1>Rock, Paper, Scissors</h1>

    <!-- show buttons for each move -->
    <form method="post">
        <?php foreach ($choices as $choice): ?>
            <button 
                type="submit" 
                name="choice" 
                value="<?= $choice ?>">
                <?= $emoji[$choice] ?> <?= ucfirst($choice) ?>
            </button>
        <?php endforeach; ?>
    </form>

    <!-- show result if we have one -->
    <?php if ($result): ?>
        <div class="result">
            <p>You chose: <strong><?= htmlspecialchars($playerChoice) ?></strong></p>
            <p>Computer chose: <strong><?= htmlspecialchars($computerChoice) ?></strong></p>
            <h2><?= $result ?></h2> <!-- who won -->
        </div>
    <?php endif; ?>
</body>
</html>
