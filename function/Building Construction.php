<?php>
function constructBuilding($userId, $buildingType) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Check if user has enough resources
    $resources = getResources($userId);
    $cost = getBuildingCost($buildingType); // Assume this function returns an array with costs

    if ($resources['metal'] >= $cost['metal'] && $resources['crystal'] >= $cost['crystal']) {
        // Deduct resources
        updateResources($userId, -$cost['metal'], -$cost['crystal'], 0);

        // Start building (you may want to add a queue system)
        $stmt = $db->prepare("INSERT INTO constructions (user_id, building_type, start_time) VALUES (:user_id, :building_type, NOW())");
        $stmt->execute([':user_id' => $userId, ':building_type' => $buildingType]);

        return "Building construction started!";
    } else {
        return "Not enough resources!";
    }
}

function getBuildingCost($buildingType) {
    // Example costs for buildings
    $buildingCosts = [
        'metal_mine' => ['metal' => 100, 'crystal' => 50],
        'crystal_mine' => ['metal' => 150, 'crystal' => 100],
        // Add more buildings as needed
    ];

    return $buildingCosts[$buildingType] ?? null;
}
</php>
