<?php
// Step 1: Database Configuration
$host = 'localhost'; // Database host
$dbname = 'your_database_name'; // Database name
$username = 'your_username'; // Database username
$password = 'your_password'; // Database password

// Step 2: Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database.<br>";

// Step 3: Create a table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Step 4: Insert a default user (optional)
$default_username = 'admin';
$default_password = password_hash('admin123', PASSWORD_DEFAULT); // Hash the password
$default_email = 'admin@example.com';

$sql = "INSERT INTO users (username, password, email) VALUES ('$default_username', '$default_password', '$default_email')";

if ($conn->query($sql) === TRUE) {
    echo "Default user created successfully.<br>";
} else {
    echo "Error inserting default user: " . $conn->error . "<br>";
}

// Step 5: Close the connection
$conn->close();
echo "Installation completed successfully.";
?>
