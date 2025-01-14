CREATE TABLE players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    current_turn INT DEFAULT 0
);

CREATE TABLE game_state (
    id INT PRIMARY KEY AUTO_INCREMENT,
    current_turn INT DEFAULT 0,
    actions TEXT
);
