<?php
// Start the session to access the selected race
session_start();

// Array of available classes
$classes = ['Warrior', 'Mage', 'Rogue', 'Cleric', 'Ranger'];

// Check if a class has been selected
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store the selected class in the session
    $_SESSION['selected_class'] = $_POST['class'];
    // Redirect to a confirmation or next step page
    header('Location: confirmation.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Character Class</title>
</head>
<body>
    <h1>Select Your Character's Class</h1>
    <form method="POST">
        <?php foreach ($classes as $class): ?>
            <input type="radio" name="class" value="<?php echo $class; ?>" required>
            <label><?php echo $class; ?></label><br>
        <?php endforeach; ?>
        <input type="submit" value="Next">
    </form>
</body>
</html>
