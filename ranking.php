<?php
session_start();
require 'config.php';

// Fetch player rankings from the database
$stmt = $pdo->query("SELECT username, score FROM players ORDER BY score DESC LIMIT 10");
$rankings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Player Rankings</title>
</head>
<body>
    <h1>Player Rankings</h1>
    <table>
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php foreach ($rankings as $index => $player): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo htmlspecialchars($player['username']); ?></td>
            <td><?php echo htmlspecialchars($player['score']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php">Back to Home</a>
</body>
</html>
