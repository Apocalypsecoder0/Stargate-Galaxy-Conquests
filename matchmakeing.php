<?php
// machmakeing.php

// Sample user data (in a real application, this would come from a database)
$users = [
    ['id' => 1, 'skill_level' => 5, 'preferences' => ['team', 'competitive']],
    ['id' => 2, 'skill_level' => 3, 'preferences' => ['casual']],
    ['id' => 3, 'skill_level' => 5, 'preferences' => ['team']],
    ['id' => 4, 'skill_level' => 2, 'preferences' => ['casual', 'competitive']],
];

// Function to find matches based on skill level and preferences
function findMatches($users, $user) {
    $matches = [];
    foreach ($users as $potentialMatch) {
        if ($user['id'] !== $potentialMatch['id'] && 
            abs($user['skill_level'] - $potentialMatch['skill_level']) <= 1 &&
            array_intersect($user['preferences'], $potentialMatch['preferences'])) {
            $matches[] = $potentialMatch;
        }
    }
    return $matches;
}

// Example usage
$currentUser = $users[0]; // User with ID 1
$matchedUsers = findMatches($users, $currentUser);

header('Content-Type: application/json');
echo json_encode($matchedUsers);
?>
