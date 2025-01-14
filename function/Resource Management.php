function getResources($userId) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Fetch resources for the user
    $stmt = $db->prepare("SELECT metal, crystal, deuterium FROM users WHERE id = :id");
    $stmt->execute([':id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateResources($userId, $metalChange, $crystalChange, $deuteriumChange) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Update resources
    $stmt = $db->prepare("UPDATE users SET metal = metal + :metal, crystal = crystal + :crystal, deuterium = deuterium + :deuterium WHERE id = :id");
    $stmt->execute([
        ':metal' => $metalChange,
        ':crystal' => $crystalChange,
        ':deuterium' => $deuteriumChange,
        ':id' => $userId
    ]);
}
