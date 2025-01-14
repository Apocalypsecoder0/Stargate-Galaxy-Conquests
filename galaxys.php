<?php
session_start();
require 'config.php';

// Fetch galaxy information from the database
$stmt = $pdo->query("SELECT * FROM galaxies");
$galaxies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galaxies</title>
</head>
<body>
    <h1>Galaxies</h1>
    <ul>
        <?php foreach ($galaxies as $galaxy): ?>
        <li>
            <strong><?php echo htmlspecialchars($galaxy['name']); ?></strong><br>
            Description: <?php echo htmlspecialchars($galaxy['description']); ?><br>
            Size: <?php echo htmlspecialchars($galaxy['size']); ?> stars
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Home</a>
</body>
</html>
