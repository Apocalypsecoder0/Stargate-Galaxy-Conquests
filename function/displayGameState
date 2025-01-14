function displayGameState() {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Get game state
    $stmt = $db->query("SELECT * FROM game_state");
    $gameState = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get players
    $stmt = $db->query("SELECT * FROM players");
    $players = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [
        'game_state' => $gameState,
        'players' => $players
    ];
}
