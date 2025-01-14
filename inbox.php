<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Fetch messages for the logged-in user
$stmt = $pdo->prepare("SELECT m.*, u.username AS sender_username FROM messages m JOIN users u ON m.sender_id = u.id WHERE m.receiver_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inbox</title>
</head>
<body>
    <h1>Inbox</h1>
    <table>
        <tr>
            <th>Sender</th>
            <th>Message</th>
            <th>Received At</th>
        </tr>
        <?php foreach ($messages as $message): ?>
        <tr>
            <td><?php echo htmlspecialchars($message['sender_username']); ?></td>
            <td><?php echo htmlspecialchars($message['message']); ?></td>
            <td><?php echo htmlspecialchars($message['created_at']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
