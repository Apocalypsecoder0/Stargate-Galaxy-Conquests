<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database');
define('DB_USER', 'username');
define('DB_PASS', 'password');

// Create a database connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
