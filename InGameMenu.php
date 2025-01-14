<?php
// InGameMenu.php

function displayMenu() {
    return json_encode([
        'options' => [
            'Empire Info' => 'empire_info.php',
            'Commands' => 'command.php',
            'Auction House' => 'auction_house.php',
            'War' => 'war.php',
            // Add more options as needed
        ]
    ]);
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo displayMenu();
}
?>
