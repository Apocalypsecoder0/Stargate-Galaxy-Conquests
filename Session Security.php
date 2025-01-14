<?php
session_start();

// Function to secure the session
function secureSession() {
    // Set session cookie parameters
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => $cookieParams['lifetime'],
        'path' => $cookieParams['path'],
        'domain' => $cookieParams['domain'],
        'secure' => true, // Only send cookie over HTTPS
        'httponly' => true, // Prevent JavaScript access to session cookie
        'samesite' => 'Strict' // Prevent CSRF attacks
    ]);

    // Regenerate session ID to prevent session fixation
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true); // True deletes the old session
        $_SESSION['initiated'] = true;
    }

    // Set a session timeout (e.g., 30 minutes)
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header('Location: login.php'); // Redirect to login
        exit();
    }
    $_SESSION['last_activity'] = time(); // Update last activity time
}

// Call the secure session function
secureSession();

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate user login
    $userId = 1; // This would typically come from a database
    $username = 'secureUser'; // This would also come from a database
    $_SESSION['user_id'] = $userId;
    $_SESSION['username'] = $username;
    header('Location: dashboard.php'); // Redirect to a protected page
    exit();
}

// Display session information
echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
echo "<br><a href='logout.php'>Logout</a>";
?>
