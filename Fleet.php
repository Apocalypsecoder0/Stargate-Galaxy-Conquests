<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Fleet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Your Fleet</h1>
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
        <h2>Your Fleet Details</h2>
        <p>Information about your fleet will be displayed here.</p>
     <?php
        // Include the fleet functions script
        include 'fleet_functions.php';

        // Get fleet details
        $fleetDetails = getFleetDetails();
        ?>

        <!-- Fleet Table -->
        <table>
            <thead>
                <tr>
                    <th>Ship Type</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fleetDetails as $ship): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ship['type']); ?></td>
                    <td><?php echo htmlspecialchars($ship['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($ship['status']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Manage Your Fleet</h3>
        <form action="manage_fleet.php" method="post">
            <label for="shipType">Select Ship Type:</label>
            <select name="shipType" id="shipType">
                <option value="fighter">Fighter</option>
                <option value="bomber">Bomber</option>
                <option value="transporter">Transporter</option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
            <button type="submit">Send Fleet</button>
        </form>
    </main>
</body>
</html>
