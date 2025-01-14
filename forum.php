<?php
// forum.php
session_start();
require 'config.php';

// Fetch forum posts
$stmt = $pdo->query("SELECT * FROM forum_posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
</head>
<body>
    <h1>Forum</h1>
    <h2>Posts</h2>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <strong><?php echo htmlspecialchars($post['title']); ?></strong><br>
                <?php echo htmlspecialchars($post['content']); ?><br>
                <em>Posted on: <?php echo htmlspecialchars($post['created_at']); ?></em>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
