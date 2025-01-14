<?php
// AuctionHouse.php

include 'db_connection.php';

function listAuctions() {
    global $conn;
    $result = $conn->query("SELECT * FROM auctions");
    $auctions = [];
    while ($row = $result->fetch_assoc()) {
        $auctions[] = $row;
    }
    return json_encode($auctions);
}

function createAuction($itemId, $startingBid, $userId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO auctions (item_id, starting_bid, seller_id) VALUES (?, ?, ?)");
    $stmt->bind_param("idi", $itemId, $startingBid, $userId);
    $stmt->execute();
    return "Auction created successfully!";
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo listAuctions();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo createAuction($_POST['item_id'], $_POST['starting_bid'], $_POST['user_id']);
}

$conn->close();
?>
