<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Simulated user data (in a real application, this would come from a database)
$user_id = $_SESSION['user_id'];
$user_data = [
    'username' => 'jane_doe',
    'email' => 'jane@example.com',
    'first_name' => 'Jane',
    'last_name' => 'Doe',
    'bio' => 'Web developer and tech enthusiast.',
];

// Handle form submission for updating user profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Here you would typically validate and save the new data to the database
    $user_data['bio'] = $_POST['bio'];
    // Simulate saving to the database
    // In a real application, you would use a database query here
    echo "<p>Profile updated successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS for styling -->
</head>
<body>
    <header>
        <h1>User Profile</h1>
        <nav>
            <a href="logout.php">Logout</a>
            <a href="accountpage.php">Account Settings</a>
        </nav>
    </header>
    <main>
        <h2>Welcome, <?php echo htmlspecialchars($user_data['first_name']); ?>!</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user_data['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></p>
        <p><strong>Bio:</strong></p>
        <form method="POST">
            <textarea name="bio" rows="4" cols="50" required><?php echo htmlspecialchars($user_data['bio']); ?></textarea><br>
            <input type="submit" value="Update Bio">
        </form>
    </main>
    <footer>
        <p>&copy; 2023 Our Company</p>
    </footer>
</body>
</html>
