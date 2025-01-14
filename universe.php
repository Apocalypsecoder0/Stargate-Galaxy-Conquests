<?php
session_start();
require 'config.php';

// Fetch universe information from the database
$stmt = $pdo->query("SELECT * FROM universe");
$universes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Universe</title>
</head>
<body>
    <h1>Universe Overview</h1>
    <ul>
        <?php foreach ($universes as $universe): ?>
        <li>
            <strong><?php echo htmlspecialchars($universe['name']); ?></strong><br>
            Description: <?php echo htmlspecialchars($universe['description']); ?><br>
            Number of Galaxies: <?php echo htmlspecialchars($universe['galaxy_count']); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Home</a>
</body>
</html>
