<?php
// Start the session
session_start();

// Simulate fetching page content based on a query parameter
$page_id = isset($_GET['id']) ? $_GET['id'] : 'home';

// Example content array
$pages = [
    'home' => '<h1>Welcome to Our Website</h1><p>This is the homepage.</p>',
    'services' => '<h1>Our Services</h1><p>We offer various services.</p>',
    'contact' => '<h1>Contact Us</h1><p>Get in touch!</p>',
];

// Get the content for the requested page or default to home
$content = isset($pages[$page_id]) ? $pages[$page_id] : $pages['home'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($page_id); ?></title>
</head>
<body>
    <header>
        <h1><?php echo ucfirst($page_id); ?></h1>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>&copy; 2025 Our Company</p>
    </footer>
</body>
</html>
