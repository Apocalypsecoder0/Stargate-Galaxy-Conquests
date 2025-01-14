<?php
// Sample data for customization options
$customizations = [
    'Hair Color' => ['Black', 'Brown', 'Blonde', 'Red'],
    'Eye Color' => ['Blue', 'Green', 'Brown', 'Gray'],
    'Armor Type' => ['Leather', 'Chainmail', 'Plate'],
];

echo "<h1>Character Customizations</h1>";
echo "<form action='save_customizations.php' method='POST'>";

foreach ($customizations as $option => $values) {
    echo "<label for='{$option}'>{$option}:</label>";
    echo "<select name='{$option}' id='{$option}'>";
    foreach ($values as $value) {
        echo "<option value='{$value}'>{$value}</option>";
    }
    echo "</select><br>";
}

echo "<input type='submit' value='Save Customizations'>";
echo "</form>";
?>
