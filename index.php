<?php
// Start the session
session_start();

// Check if the user is logged in (optional)
$isLoggedIn = isset($_SESSION['username']);

// Function to display a welcome message
function displayWelcomeMessage($username) {
    return "Welcome, " . htmlspecialchars($username) . "!";
}

// Handle form submission (optional)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $username = $_POST['username'] ?? '';
    $_SESSION['username'] = $username; // Store username in session
    header("Location: index.php"); // Redirect to the same page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Application</title>
    <link rel="stylesheet" href="index_styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>My PHP Application</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="fourm.php">Fourm</a></li>
                <?php if ($isLoggedIn): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <?php if ($isLoggedIn): ?>
                <h2><?php echo displayWelcomeMessage($_SESSION['username']); ?></h2>
            <?php else: ?>
                <h2>Welcome to My PHP Application!</h2>
                <p>Please enter your username to get started:</p>
                <form method="POST" action="">
                    <input type="text" name="username" placeholder="Enter your username" required>
                    <button type="submit">Submit</button>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My PHP Application. All rights reserved.</p>
    </footer>
</body>
</html>
