<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - My PHP Application</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome to My PHP Application</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Welcome to your dashboard. Here you can manage your account and access various features of the application.</p>
            <p>Feel free to explore the application!</p>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My PHP Application. All rights reserved.</p>
    </footer>
</body>
</html>
