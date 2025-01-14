<?php
session_start();

// Sample destinations for travel
$destinations = [
    'Earth' => 'Welcome to Earth!',
    'Mars' => 'Welcome to Mars!',
    'Jupiter' => 'Welcome to Jupiter!',
    'Andromeda' => 'Welcome to Andromeda!',
];

// Check if a destination is selected
if (isset($_POST['destination'])) {
    $_SESSION['destination'] = $_POST['destination'];
    header('Location: Stargate.php'); // Redirect to Stargate
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Portal</title>
</head>
<body>
    <h1>Travel Portal</h1>
    <form method="POST">
        <label for="destination">Select your destination:</label>
        <select name="destination" id="destination" required>
            <option value="">--Choose a destination--</option>
            <?php foreach ($destinations as $key => $value): ?>
                <option value="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($key); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Travel">
    </form>
</body>
</html>
