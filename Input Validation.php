<?php
// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data)); // Remove whitespace and convert special characters to HTML entities
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate username
    $username = sanitizeInput($_POST['username']);
    if (empty($username)) {
        echo "Username is required.";
    } else {
        echo "Username is valid: " . htmlspecialchars($username);
    }

    // Sanitize and validate email
    $email = sanitizeInput($_POST['email']);
    if (!validateEmail($email)) {
        echo "Invalid email format.";
    } else {
        echo "Email is valid: " . htmlspecialchars($email);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Validation Example</title>
</head>
<body>
    <h1>Input Validation Example</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
