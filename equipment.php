<?php
// equipment.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user equipment
$stmt = $pdo->prepare("SELECT * FROM user_equipment WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$equipment = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Equipment</title>
</head>
<body>
    <h1>User Equipment</h1>
    <ul>
        <?php foreach ($equipment as $item): ?>
            <li><?php echo htmlspecialchars($item['item_name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
