<?php
session_start();

// Check if a destination is set
if (!isset($_SESSION['destination'])) {
    header('Location: Travel.php'); // Redirect to Travel if no destination is set
    exit();
}

// Get the selected destination
$destination = $_SESSION['destination'];

// Clear the session destination after use
unset($_SESSION['destination']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stargate</title>
</head>
<body>
    <h1>Stargate</h1>
    <p>Activating Stargate to <?php echo htmlspecialchars($destination); ?>...</p>
    <p><?php echo htmlspecialchars($destination); ?></p>
    <a href="Jumpgate.php">Proceed to Jumpgate</a>
</body>
</html>
