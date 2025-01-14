<?php
// Alliance.php
include 'config.php';
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create an alliance
function createAlliance($allianceName, $userId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO alliances (name, creator_id) VALUES (?, ?)");
    $stmt->bind_param("si", $allianceName, $userId);
    $stmt->execute();
    $stmt->close();
    return "Alliance created successfully!";
}

// Function to join an alliance
function joinAlliance($allianceId, $userId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO alliance_members (alliance_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $allianceId, $userId);
    $stmt->execute();
    $stmt->close();
    return "Joined the alliance successfully!";
}

// Function to list all alliances
function listAlliances() {
    global $conn;
    $result = $conn->query("SELECT * FROM alliances");
    $alliances = [];
    while ($row = $result->fetch_assoc()) {
        $alliances[] = $row;
    }
    return json_encode($alliances);
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                echo createAlliance($_POST['name'], $_POST['user_id']);
                break;
            case 'join':
                echo joinAlliance($_POST['alliance_id'], $_POST['user_id']);
                break;
        }
    }
} else {
    // For GET requests, list all alliances
    echo listAlliances();
}

// Close connection
$conn->close();
?>
