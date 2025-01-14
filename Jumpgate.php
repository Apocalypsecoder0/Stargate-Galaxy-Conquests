<?php
session_start();

// Check if a destination is set
if (!isset($_SESSION['destination'])) {
    header('Location: Travel.php'); // Redirect to Travel if no destination is set
    exit();
}

// Get the selected destination
$destination = $_SESSION['destination'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jumpgate</title>
</head>
<body>
    <h1>Jumpgate</h1>
    <p>Jumping to <?php echo htmlspecialchars($destination); ?>...</p>
    <p>Welcome to <?php echo htmlspecialchars($destination); ?>!</p>
    <a href="Travel.php">Start a New Journey</a>
</body>
</html>
