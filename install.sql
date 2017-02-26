DROP DATABASE IF EXISTS parameter;

CREATE DATABASE parameter DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use parameter;

CREATE TABLE configs (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    value INT,
    published_at DATETIME NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
                        
INSERT INTO configs (title, value, published_at)
VALUES
('A', 50, NOW()),
('B', 50, NOW()),
('C', 50, NOW()),
('D', 50, NOW()),
('E', 50, NOW());           