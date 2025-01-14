<?php
session_start();
require 'config.php';

// Fetch research topics from the database
$stmt = $pdo->query("SELECT * FROM research_topics");
$research_topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Research Library</title>
</head>
<body>
    <h1>Research Library</h1>
    <ul>
        <?php foreach ($research_topics as $topic): ?>
        <li>
            <strong><?php echo htmlspecialchars($topic['title']); ?></strong><br>
            Description: <?php echo htmlspecialchars($topic['description']); ?><br>
            Required Level: <?php echo htmlspecialchars($topic['required_level']); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Home</a>
</body>
</html>
