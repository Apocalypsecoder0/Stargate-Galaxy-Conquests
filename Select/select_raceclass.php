<?php
// Start the session to store user selections
session_start();

// Array of available races
$races = ['Human', 'Elf', 'Dwarf', 'Orc', 'Halfling'];

// Check if a race has been selected
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store the selected race in the session
    $_SESSION['selected_race'] = $_POST['race'];
    // Redirect to the character class selection page
    header('Location: select_characterclass.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Race</title>
</head>
<body>
    <h1>Select Your Character's Race</h1>
    <form method="POST">
        <?php foreach ($races as $race): ?>
            <input type="radio" name="race" value="<?php echo $race; ?>" required>
            <label><?php echo $race; ?></label><br>
        <?php endforeach; ?>
        <input type="submit" value="Next">
    </form>
</body>
</html>
