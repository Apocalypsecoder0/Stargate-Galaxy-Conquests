<?php
// Character creation form
echo "<h1>Create Your Character</h1>";
echo "<form action='save_character.php' method='POST'>";
echo "<label for='name'>Character Name:</label>";
echo "<input type='text' id='name' name='name' required><br>";

echo "<label for='class'>Class:</label>";
echo "<select name='class' id='class'>";
echo "<option value='Warrior'>Warrior</option>";
echo "<option value='Mage'>Mage</option>";
echo "<option value='Rogue'>Rogue</option>";
echo "</select><br>";

echo "<label for='level'>Starting Level:</label>";
echo "<input type='number' id='level' name='level' value='1' min='1' required><br>";

echo "<input type='submit' value='Create Character'>";
echo "</form>";
?>
