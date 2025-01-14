<?php
// Sample data for dungeons
$dungeons = [
    ['id' => 1, 'name' => 'Cavern of Shadows', 'difficulty' => 'Medium'],
    ['id' => 2, 'name' => 'Temple of Light', 'difficulty' => 'Hard'],
];

echo "<h1>Co-op Dungeons</h1>";
echo "<ul>";
foreach ($dungeons as $dungeon) {
    echo "<li><a href='dungeon.php?id={$dungeon['id']}'>{$dungeon['name']} (Difficulty: {$dungeon['difficulty']})</a></li>";
}
echo "</ul>";
?>
