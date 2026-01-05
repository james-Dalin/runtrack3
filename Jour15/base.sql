CREATE DATABASE autocompletion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE autocompletion;

CREATE TABLE Pokemon (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    type VARCHAR(50) NOT NULL,
    generation INT NOT NULL,
    description TEXT,
    imageUrl VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
