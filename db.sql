DROP DATABASE IF EXISTS forum;

CREATE DATABASE forum;

USE forum;

CREATE TABLE
    users (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        rol TINYINT (1) NOT NULL
    );

CREATE TABLE
    topics (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        date DATETIME NOT NULL,
        id_author INT (11) NOT NULL,
        FOREIGN KEY (id_author) REFERENCES users (id)
    );

CREATE TABLE
    comments (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        content TEXT NOT NULL,
        date DATETIME NOT NULL,
        id_author INT (11) NOT NULL,
        id_post INT (11) NOT NULL,
        FOREIGN KEY (id_post) REFERENCES topics (id) ON DELETE CASCADE,
        FOREIGN KEY (id_author) REFERENCES users (id) ON DELETE CASCADE
    );