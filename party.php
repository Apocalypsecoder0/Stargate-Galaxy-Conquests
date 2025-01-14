<?php
session_start();

// Sample parties (in a real application, this would come from a database)
$parties = [
    'Adventurers' => ['Alice', 'Bob'],
    'Explorers' => ['Charlie'],
    'Warriors' => ['Dave', 'Eve'],
];

// Initialize user party membership
if (!isset($_SESSION['party'])) {
    $_SESSION['party'] = null; // No party membership by default
}

// Handle party joining
if (isset($_POST['join_party'])) {
    $selectedParty = $_POST['party'];
    if (array_key_exists($selectedParty, $parties)) {
        // Check if the user is already in a party
        if (!in_array($_SESSION['username'], $parties[$selectedParty])) {
            $parties[$selectedParty][] = $_SESSION['username']; // Add user to the party
            $_SESSION['party'] = $selectedParty; // Set the user's party
            $message = "You have joined the party: " . htmlspecialchars($selectedParty);
        } else {
            $message = "You are already a member of this party.";
        }
    } else {
        $message = "Invalid party selection.";
    }
}

// Handle party leaving
if (isset($_POST['leave_party'])) {
    $currentParty = $_SESSION['party'];
    if ($currentParty && in_array($_SESSION['username'], $parties[$currentParty])) {
        // Remove user from the party
        $parties[$currentParty] = array_diff($parties[$currentParty], [$_SESSION['username']]);
        $_SESSION['party'] = null; // Leave the party
        $message = "You have left the party.";
    } else {
        $message = "You are not a member of any party.";
    }
}

// Handle party creation
if (isset($_POST['create_party'])) {
    $newPartyName = $_POST['new_party_name'];
    if (!array_key_exists($newPartyName, $parties)) {
        $parties[$newPartyName] = [$_SESSION['username']]; // Create a new party with the user as a member
        $_SESSION['party'] = $newPartyName; // Set the user's party
        $message = "You have created the party: " . htmlspecialchars($newPartyName);
    } else {
        $message = "A party with this name already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Party Management</title>
</head>
<body>
    <h1>Party Management</h1>

    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <h2>Available Parties</h2>
    <ul>
        <?php foreach ($parties as $name => $members): ?>
            <li>
                <strong><?php echo htmlspecialchars($name); ?></strong>: <?php echo htmlspecialchars(implode(', ', $members)); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php if ($_SESSION['party']): ?>
        <h3>Your Party</h3>
        <p>You are a member of the <strong><?php echo htmlspecialchars($_SESSION['party']); ?></strong> party.</p>
        <form method="POST">
            <input type="submit" name="leave_party" value="Leave Party">
        </form>
    <?php else: ?>
        <h3>Join a Party</h3>
        <form method="POST">
            <label for="party">Select a party:</label>
            <select name="party" id="party" required>
                <option value="">--Choose a party--</option>
                <?php foreach ($parties as $key => $value): ?>
                    <option value="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($key); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="join_party" value="Join Party">
        </form>

        <h3>Create a New Party</h3>
        <form method="POST">
            <label for="new_party_name">Party Name:</label>
            <input type="text" name="new_party_name" id="new_party_name" required>
            <input type="submit" name="create_party" value="Create Party">
        </form>
    <?php endif; ?>

    <br>
    <a href="Travel.php">Back to Travel Portal</a>
</body>
</html>
