function takeTurn($playerId, $action) {
    // Connect to database
    $db = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');

    // Get current turn
    $stmt = $db->query("SELECT current_turn FROM game_state");
    $currentTurn = $stmt->fetchColumn();

    // Check if it's the player's turn
    $stmt = $db->prepare("SELECT current_turn FROM players WHERE id = :id");
    $stmt->execute([':id' => $playerId]);
    $playerTurn = $stmt->fetchColumn();

    if ($playerTurn != $currentTurn) {
        return "It's not your turn!";
    }

    // Perform action (this is a simplified example)
    // Update actions in game state
    $stmt = $db->prepare("UPDATE game_state SET actions = CONCAT(actions, :action) WHERE id = 1");
    $stmt->execute([':action' => $action]);

    // Update player's turn
    $stmt = $db->prepare("UPDATE players SET current_turn = current_turn + 1 WHERE id = :id");
    $stmt->execute([':id' => $playerId]);

    // Update game state to next turn
    $stmt = $db->prepare("UPDATE game_state SET current_turn = current_turn + 1 WHERE id = 1");
    $stmt->execute();

    return "Action taken!";
}
