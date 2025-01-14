<?php
// Race.php

// Database connection
include 'db_connection.php'; // Assuming you have a separate file for DB connection

// Function to get all races
function getAllRaces() {
    global $conn;
    $result = $conn->query("SELECT * FROM races");
    $races = [];
    while ($row = $result->fetch_assoc()) {
        $races[] = $row;
    }
    return json_encode($races);
}

// Function to get race details by ID
function getRaceById($raceId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM races WHERE id = ?");
    $stmt->bind_param("i", $raceId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Get specific race details
        $raceInfo = getRaceById($_GET['id']);
        echo json_encode($raceInfo);
    } else {
        // Get all races
        echo getAllRaces();
    }
}

$conn->close();
?>
