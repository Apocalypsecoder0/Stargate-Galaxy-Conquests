<?php
session_start();
require 'config.php';

// Handle search query
$search_result = [];
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $stmt = $pdo->prepare("SELECT * FROM players WHERE username LIKE ?");
    $stmt->execute(['%' . $search_query . '%']);
    $search_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Player Search</title>
</head>
<body>
    <h1>Search for Players</h1>
    <form method="POST">
        <input type="text" name="search_query" placeholder="Enter username" required>
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($search_result)): ?>
    <h2>Search Results</h2>
    <ul>
        <?php foreach ($search_result as $player): ?>
        <li><?php echo htmlspecialchars($player['username']); ?> - Score: <?php echo htmlspecialchars($player['score']); ?></li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>No players found.</p>
    <?php endif; ?>

    <a href="index.php">Back to Home</a>
</body>
</html>
