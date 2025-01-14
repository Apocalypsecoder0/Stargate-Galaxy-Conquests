<?php
// command_center.php

// Include the empire functions
include 'empire_functions.php';

// Handle form submissions
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addResources'])) {
        $gold = intval($_POST['gold']);
        $food = intval($_POST['food']);
        $wood = intval($_POST['wood']);
        $message = addResources($gold, $food, $wood);
    } elseif (isset($_POST['addToFleet'])) {
        $shipType = $_POST['shipType'];
        $quantity = intval($_POST['quantity']);
        $message = addToFleet($shipType, $quantity);
    } elseif (isset($_POST['upgradeBuilding'])) {
        $buildingType = $_POST['buildingType'];
        $message = upgradeBuilding($buildingType);
    }
}

// Get current resources and fleet details
$currentResources = getResources();
$currentFleet = getFleetDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empire Command Center</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Empire Command Center</h1>
    </header>
    <main>
        <h2>Current Resources</h2>
        <p>Gold: <?php echo $currentResources['gold']; ?></p>
        <p>Food: <?php echo $currentResources['food']; ?></p>
        <p>Wood: <?php echo $currentResources['wood']; ?></p>

        <h2>Current Fleet</h2>
        <ul>
            <li>Fighters: <?php echo $currentFleet['fighters']; ?></li>
            <li>Bombers: <?php echo $currentFleet['bombers']; ?></li>
            <li>Transports: <?php echo $currentFleet['transports']; ?></li>
        </ul>

        <h2>Manage Resources</h2>
        <form method="post">
            <label for="gold">Gold:</label>
            <input type="number" name="gold" id="gold" min="0" required>
            <label for="food">Food:</label>
            <input type="number" name="food" id="food" min="0" required>
            <label for="wood">Wood:</label>
            <input type="number" name="wood" id="wood" min="0" required>
            <button type="submit" name="addResources">Add Resources</button>
        </form>

        <h2>Manage Fleet</h2>
        <form method="post">
            <label for="shipType">Ship Type:</label>
            <select name="shipType" id="shipType">
                <option value="fighters">Fighter</option>
                <option value="bombers">Bomber</option>
                <option value="transports">Transport</option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
            <button type="submit" name="addToFleet">Add to Fleet</button>
        </form>

        <h2>Upgrade Building</h2>
        <form method="post">
            <label for="buildingType">Building Type:</label>
            <input type="text" name="buildingType" id="buildingType" required>
            <button type="submit" name="upgradeBuilding">Upgrade Building</button>
        </form>

        <h2>Message</h2>
        <p><?php echo $message; ?></p>
    </main>
</body>
</html>
