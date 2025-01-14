<?php
// EmpireInfo.php

// Database connection
include 'db_connection.php'; // Assuming you have a separate file for DB connection

function getEmpireInfo($userId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM empires WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $empireInfo = getEmpireInfo($_GET['user_id']);
    echo json_encode($empireInfo);
}

$conn->close();
?>
