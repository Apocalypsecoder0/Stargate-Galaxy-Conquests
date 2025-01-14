<?php
// RaceSection.php

include 'db_connection.php';

// Function to get race abilities
function getRaceAbilities($raceId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM race_abilities WHERE race_id = ?");
    $stmt->bind_param("i", $raceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $abilities = [];
    while ($row = $result->fetch_assoc()) {
        $abilities[] = $row;
    }
    return json_encode($abilities);
}

// Function to select a race for a player
function selectRace($userId, $raceId) {
    global $conn;
    $stmt = $conn->prepare("UPDATE players SET race_id = ? WHERE id = ?");
    $stmt->bind_param("ii", $raceId, $userId);
    $stmt->execute();
    return "Race selected successfully!";
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'select') {
        echo selectRace($_POST['user_id'], $_POST['race_id']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['race_id'])) {
    echo getRaceAbilities($_GET['race_id']);
}

$conn->close();
?>
