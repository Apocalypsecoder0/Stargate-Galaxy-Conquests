<?php
session_start();

// Function to initialize a session
function initializeSession($userId, $username) {
    $_SESSION['user_id'] = $userId;
    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;

    // Set session timeout to 30 minutes
    $_SESSION['last_activity'] = time();
}

// Function to check if the session is active
function isSessionActive() {
    // Check if the session has been inactive for more than 30 minutes
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        return false; // Session is not active
    }
    $_SESSION['last_activity'] = time(); // Update last activity time
    return true; // Session is active
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate user login
    $userId = 1; // This would typically come from a database
    $username = 'exampleUser'; // This would also come from a database
    initializeSession($userId, $username);
    header('Location: dashboard.php'); // Redirect to a protected page
    exit();
}

// Check if the session is active
if (!isSessionActive()) {
    header('Location: login.php'); // Redirect to login if session is not active
    exit();
}

// Display session information
echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
echo "<br><a href='logout.php'>Logout</a>";
?>
