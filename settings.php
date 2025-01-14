<?php
// settings.php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user settings from the database
$stmt = $pdo->prepare("SELECT * FROM user_settings WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

// Update settings if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_setting = $_POST['setting'];
    $stmt = $pdo->prepare("UPDATE user_settings SET setting_value = ? WHERE user_id = ?");
    $stmt->execute([$new_setting, $_SESSION['user_id']]);
    echo "<p>Settings updated successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Settings</title>
</head>
<body>
    <h1>User Settings</h1>
    <form method="POST">
        <label for="setting">Setting:</label>
        <input type="text" id="setting" name="setting" value="<?php echo htmlspecialchars($settings['setting_value']); ?>" required><br>
        <input type="submit" value="Update Settings">
    </form>
</body>
</html>
