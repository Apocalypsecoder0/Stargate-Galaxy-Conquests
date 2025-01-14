<?php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Custom error handler function
function customError($errno, $errstr, $errfile, $errline) {
    // Log error details to a file
    error_log("Error [$errno]: $errstr in $errfile on line $errline", 3, 'errors.log');

    // Display a user-friendly error message
    echo "<h1>Oops! Something went wrong.</h1>";
    echo "<p>We're sorry for the inconvenience. Please try again later.</p>";
    exit();
}

// Set the custom error handler
set_error_handler("customError");

// Example code that triggers an error
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate a division by zero error
    $number = 10;
    $divisor = 0;

    if ($divisor == 0) {
        trigger_error("Division by zero error", E_USER_WARNING);
    } else {
        $result = $number / $divisor;
        echo "Result: " . $result;
    }
}

// Display a form to trigger the error
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error Handling Example</title>
</head>
<body>
    <h1>Error Handling Example</h1>
    <form method="POST">
        <input type="submit" value="Trigger Error">
    </form>
</body>
</html>
