// Initialize game
function initializeGame($players) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Insert players into the database
    foreach ($players as $player) {
        $stmt = $db->prepare("INSERT INTO players (username) VALUES (:username)");
        $stmt->execute([':username' => $player]);
    }

    // Initialize game state
    $stmt = $db->prepare("INSERT INTO game_state (current_turn, actions) VALUES (0, '')");
    $stmt->execute();
}
