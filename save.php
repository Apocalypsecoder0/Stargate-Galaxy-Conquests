<?php
// save.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Save user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE user_data SET username = ?, email = ? WHERE user_id = ?");
    $stmt->execute([$username, $email, $_SESSION['user_id']]);
    echo "<p>Data saved successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save User Data</title>
</head>
<body>
    <h1>Save User Data</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Save Data">
    </form>
</body>
</html>
