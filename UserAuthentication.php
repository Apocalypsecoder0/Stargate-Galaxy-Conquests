<?php
// UserAuthentication.php

session_start();
include 'db_connection.php'; // Assuming you have a separate file for DB connection

function login($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username; // Store username in session
            return "Login successful!";
        } else {
            return "Invalid password.";
        }
    } else {
        return "Username not found.";
    }
}

function logout() {
    session_destroy(); // Destroy the session
    return "Logged out successfully.";
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        echo login($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'logout') {
        echo logout();
    }
}
?>
