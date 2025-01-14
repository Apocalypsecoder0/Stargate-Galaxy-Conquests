<?php
session_start();
require 'config.php';

// Fetch technology information from the database
$stmt = $pdo->query("SELECT * FROM technologies");
$technologies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Technologies</title>
</head>
<body>
    <h1>Available Technologies</h1>
    <ul>
        <?php foreach ($technologies as $tech): ?>
        <li>
            <strong><?php echo htmlspecialchars($tech['name']); ?></strong><br>
            Description: <?php echo htmlspecialchars($tech['description']); ?><br>
            Level: <?php echo htmlspecialchars($tech['level']); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Home</a>
</body>
</html>
