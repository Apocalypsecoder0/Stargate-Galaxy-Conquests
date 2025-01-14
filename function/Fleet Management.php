<?php
>function createFleet($userId, $shipType, $quantity) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Check if user has enough resources (assuming ships require resources)
    $cost = getShipCost($shipType, $quantity); // Assume this function returns an array with costs

    $resources = getResources($userId);
    if ($resources['metal'] >= $cost['metal'] && $resources['crystal'] >= $cost['crystal']) {
        // Deduct resources
        updateResources($userId, -$cost['metal'], -$cost['crystal'], 0);

        // Create fleet
        $stmt = $db->prepare("INSERT INTO fleets (user_id, ship_type, quantity) VALUES (:user_id, :ship_type, :quantity)");
        $stmt->execute([':user_id' => $userId, ':ship_type' => $shipType, ':quantity' => $quantity]);

        return "Fleet created!";
    } else {
        return "Not enough resources!";
    }
}

function getShipCost($shipType, $quantity) {
    // Example costs for ships
    $shipCosts = [
        'fighter' => ['metal' => 200, 'crystal' => 100],
        'bomber' => ['metal' => 300, 'crystal' => 200],
        // Add more ships as needed
    ];

    $cost = $shipCosts[$shipType] ?? null;
    return [
        'metal' => $cost['metal'] * $quantity,
        'crystal' => $cost['crystal'] * $quantity
    ];
}
</php>
