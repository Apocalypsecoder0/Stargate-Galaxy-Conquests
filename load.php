<?php
// load.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Load user data
$stmt = $pdo->prepare("SELECT * FROM user_data WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

// Display user data
echo "<h1>User Data</h1>";
echo "<p>Username: " . htmlspecialchars($user_data['username']) . "</p>";
echo "<p>Email: " . htmlspecialchars($user_data['email']) . "</p>";
?>
