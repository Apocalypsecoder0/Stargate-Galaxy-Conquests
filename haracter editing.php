<?php
// Sample data for an existing character (in a real application, this would come from a database)
$character = [
    'id' => 1,
    'name' => 'Heroic Knight',
    'class' => 'Warrior',
    'level' => 5,
];

// Character editing form
echo "<h1>Edit Character: {$character['name']}</h1>";
echo "<form action='update_character.php' method='POST'>";
echo "<input type='hidden' name='id' value='{$character['id']}'>";

echo "<label for='name'>Character Name:</label>";
echo "<input type='text' id='name' name='name' value='{$character['name']}' required><br>";

echo "<label for='class'>Class:</label>";
echo "<select name='class' id='class'>";
$options = ['Warrior', 'Mage', 'Rogue'];
foreach ($options as $option) {
    $selected = ($option == $character['class']) ? 'selected' : '';
    echo "<option value='{$option}' {$selected}>{$option}</option>";
}
echo "</select><br>";

echo "<label for='level'>Level:</label>";
echo "<input type='number' id='level' name='level' value='{$character['level']}' min='1' required><br>";

echo "<input type='submit' value='Update Character'>";
echo "</form>";
?>
