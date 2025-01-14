<?php
// Sample data for weekly missions
$missions = [
    ['id' => 1, 'title' => 'Defeat the Goblin King', 'reward' => '100 Gold'],
    ['id' => 2, 'title' => 'Collect 10 Herbs', 'reward' => '50 Gold'],
];

echo "<h1>Weekly Missions</h1>";
echo "<ul>";
foreach ($missions as $mission) {
    echo "<li>{$mission['title']} - Reward: {$mission['reward']} <a href='accept_mission.php?id={$mission['id']}'>Accept</a></li>";
}
echo "</ul>";
?>
