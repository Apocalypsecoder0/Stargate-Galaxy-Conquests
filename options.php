<?php
// options.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user options from the database
$stmt = $pdo->prepare("SELECT * FROM user_options WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$options = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Options</title>
</head>
<body>
    <h1>User Options</h1>
    <p>Current Option: <?php echo htmlspecialchars($options['option_value']); ?></p>
    <!-- Additional options can be displayed and modified here -->
</body>
</html>
