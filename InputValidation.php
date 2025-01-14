<?php
// InputValidation.php

function validateUsername($username) {
    // Check if the username is alphanumeric and between 3 to 20 characters
    return preg_match('/^[a-zA-Z0-9]{3,20}$/', $username);
}

function validateEmail($email) {
    // Check if the email is valid
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePassword($password) {
    // Check if the password is at least 8 characters long and contains at least one number
    return preg_match('/^(?=.*[0-9]).{8,}$/', $password);
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!validateUsername($username)) {
        echo "Invalid username. It must be 3-20 characters long and alphanumeric.";
    } elseif (!validateEmail($email)) {
        echo "Invalid email format.";
    } elseif (!validatePassword($password)) {
        echo "Password must be at least 8 characters long and contain at least one number.";
    } else {
        echo "All inputs are valid!";
        // Proceed with further processing (e.g., registration)
    }
}
?>
