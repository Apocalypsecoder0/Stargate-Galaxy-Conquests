<?php
session_start();

// Sample parties with skills and levels (in a real application, this would come from a database)
$parties = [
    'Adventurers' => [
        'members' => ['Alice', 'Bob'],
        'skills' => ['combat', 'exploration'],
        'level' => 5,
        'interests' => ['adventure', 'treasure hunting']
    ],
    'Explorers' => [
        'members' => ['Charlie'],
        'skills' => ['navigation', 'survival'],
        'level' => 3,
        'interests' => ['exploration', 'nature']
    ],
    'Warriors' => [
        'members' => ['Dave', 'Eve'],
        'skills' => ['combat', 'strategy'],
        'level' => 4,
        'interests' => ['battle', 'training']
    ],
    'Mages' => [
        'members' => ['Frank'],
        'skills' => ['magic', 'alchemy'],
        'level' => 6,
        'interests' => ['magic', 'research']
    ],
];

// Initialize user data (in a real application, this would come from a database)
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'User'; // Placeholder for logged-in user
}
if (!isset($_SESSION['skills'])) {
    $_SESSION['skills'] = ['combat']; // Example skills
}
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 4; // Example level
}
if (!isset($_SESSION['interests'])) {
    $_SESSION['interests'] = ['adventure', 'battle']; // Example interests
}

// Matchmaking logic
$matchedParties = [];
foreach ($parties as $partyName => $details) {
    // Check if user skills match party skills
    $skillsMatch = !empty(array_intersect($_SESSION['skills'], $details['skills']));
    // Check if user level is within range of party level
    $levelMatch = $_SESSION['level'] >= $details['level'] - 1 && $_SESSION['level'] <= $details['level'] + 1;
    // Check if user interests match party interests
    $interestsMatch = !empty(array_intersect($_SESSION['interests'], $details['interests']));

    // If all criteria match, add to matched parties
    if ($skillsMatch && $levelMatch && $interestsMatch) {
        $matchedParties[$partyName] = $details['members'];
    }
}

// Handle joining a party
if (isset($_POST['join_party'])) {
    $selectedParty = $_POST['party'];
    if (array_key_exists($selectedParty, $parties)) {
        // Check if the user is already in a party
        if (!in_array($_SESSION['username'], $parties[$selectedParty]['members'])) {
            $parties[$selectedParty]['members'][] = $_SESSION['username']; // Add user to the party
            $message = "You have joined the party: " . htmlspecialchars($selectedParty);
        } else {
            $message = "You are already a member of this party.";
        }
    } else {
        $message = "Invalid party selection.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced Matchmaking</title>
</head>
<body>
    <h1>Advanced Matchmaking</h1>

    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <h2>Your Profile</h2>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <p><strong>Skills:</strong> <?php echo htmlspecialchars(implode(', ', $_SESSION['skills'])); ?></p>
    <p><strong>Level:</strong> <?php echo htmlspecialchars($_SESSION['level']); ?></p>
    <p><strong>Interests:</strong> <?php echo htmlspecialchars(implode(', ', $_SESSION['interests'])); ?></p>

    <h2>Matched Parties</h2>
    <?php if (!empty($matchedParties)): ?>
        <ul>
            <?php foreach ($matchedParties as $name => $members): ?>
                <li>
                    <strong><?php echo htmlspecialchars($name); ?></strong>: <?php echo htmlspecialchars(implode(', ', $members)); ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="party" value="<?php echo htmlspecialchars($name); ?>">
                        <input type="submit" name="join_party" value="Join Party">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No matching parties found based on your profile.</p>
    <?php endif; ?>

    <br>
    <a href="Travel.php">Back to Travel Portal</a>
</body>
</html>
