<?php
// Command.php

include 'db_connection.php';

function issueCommand($userId, $commandType, $targetId) {
    global $conn;
    // Logic to handle different command types
    switch ($commandType) {
        case 'build':
            // Code to build a structure
            break;
        case 'attack':
            // Code to launch an attack
            break;
        // Add more command types as needed
    }
    return "Command issued successfully!";
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = issueCommand($_POST['user_id'], $_POST['command_type'], $_POST['target_id']);
    echo $response;
}

$conn->close();
?>
