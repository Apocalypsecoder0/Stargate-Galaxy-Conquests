<?php
session_start();

// Sample guilds (in a real application, this would come from a database)
$guilds = [
    'Explorers' => 'A guild for adventurous travelers.',
    'Warriors' => 'A guild for those who seek to conquer challenges.',
    'Mages' => 'A guild for those who wield magic and knowledge.',
];

// Initialize user guild membership
if (!isset($_SESSION['guild'])) {
    $_SESSION['guild'] = null; // No guild membership by default
}

// Handle guild joining
if (isset($_POST['join_guild'])) {
    $selectedGuild = $_POST['guild'];
    if (array_key_exists($selectedGuild, $guilds)) {
        $_SESSION['guild'] = $selectedGuild; // Set the user's guild
        $message = "You have joined the guild: " . htmlspecialchars($selectedGuild);
    } else {
        $message = "Invalid guild selection.";
    }
}

// Handle guild leaving
if (isset($_POST['leave_guild'])) {
    $_SESSION['guild'] = null; // Leave the guild
    $message = "You have left the guild.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guild Management</title>
</head>
<body>
    <h1>Guild Management</h1>

    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <h2>Available Guilds</h2>
    <ul>
        <?php foreach ($guilds as $name => $description): ?>
            <li>
                <strong><?php echo htmlspecialchars($name); ?></strong>: <?php echo htmlspecialchars($description); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if ($_SESSION['guild']): ?>
        <h3>Your Guild</h3>
        <p>You are a member of the <strong><?php echo htmlspecialchars($_SESSION['guild']); ?></strong> guild.</p>
        <form method="POST">
            <input type="submit" name="leave_guild" value="Leave Guild">
        </form>
    <?php else: ?>
        <h3>Join a Guild</h3>
        <form method="POST">
            <label for="guild">Select a guild:</label>
            <select name="guild" id="guild" required>
                <option value="">--Choose a guild--</option>
                <?php foreach ($guilds as $key => $value): ?>
                    <option value="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($key); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="join_guild" value="Join Guild">
        </form>
    <?php endif; ?>

    <br>
    <a href="Travel.php">Back to Travel Portal</a>
</body>
</html>
