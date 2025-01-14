<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    // Insert message into the database
    $stmt = $pdo->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $receiver_id, $message]);

    echo "<p>Message sent successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Message</title>
</head>
<body>
    <h1>Send Message</h1>
    <form method="POST">
        <label for="receiver_id">Receiver User ID:</label>
        <input type="number" id="receiver_id" name="receiver_id" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <input type="submit" value="Send Message">
    </form>
</body>
</html>
