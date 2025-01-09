CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    platform VARCHAR(50) NOT NULL,
    update_number VARCHAR(50),
    format VARCHAR(50),
    is_physical BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);