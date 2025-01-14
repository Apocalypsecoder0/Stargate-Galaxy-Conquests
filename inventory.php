<?php
// inventory.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user inventory
$stmt = $pdo->prepare("SELECT * FROM user_inventory WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Inventory</title>
</head>
<body>
    <h1>User Inventory</h1>
    <ul>
        <?php foreach ($inventory as $item): ?>
            <li><?php echo htmlspecialchars($item['item_name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
