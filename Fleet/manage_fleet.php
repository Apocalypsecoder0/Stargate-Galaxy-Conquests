
<?php
// manage_fleet.php

// Include the fleet functions script
include 'fleet_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shipType = $_POST['shipType'];
    $quantity = $_POST['quantity'];

    // Call the manageFleet function to process the action
    $resultMessage = manageFleet($shipType, $quantity);
} else {
    $resultMessage = "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Management Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Fleet Management Result</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="fleet.php">Fleet</a></li>
                <li><a href="resources.php">Resources</a></li>
                <li><a href="research.php">Research</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Action Result</h2>
        <p><?php echo htmlspecialchars($resultMessage); ?></p>
        <a href="fleet.php">Go back to Fleet Management</a>
    </main>
</body>
</html>
