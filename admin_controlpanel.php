<?php
session_start();
require 'config.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Fetch all users
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle user deletion
if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    header('Location: admin_controlpanel.php'); // Redirect to avoid resubmission
    exit();
}

// Fetch all forum posts
$stmt = $pdo->query("SELECT * FROM forum_posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Control Panel</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        a { color: red; }
    </style>
</head>
<body>
    <h1>Admin Control Panel</h1>

    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td>
                <a href="?delete_user=<?php echo htmlspecialchars($user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Manage Forum Posts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo htmlspecialchars($post['id']); ?></td>
            <td><?php echo htmlspecialchars($post['title']); ?></td>
            <td><?php echo htmlspecialchars($post['content']); ?></td>
            <td><?php echo htmlspecialchars($post['created_at']); ?></td>
            <td>
                <a href="?delete_post=<?php echo htmlspecialchars($post['id']); ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>
