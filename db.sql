-- Create database
CREATE DATABASE phpblog;

-- Use the created database
USE phpblog;

-- Create Users table
CREATE TABLE Users (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create Posts table
CREATE TABLE Posts (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    content TEXT,
    created_on DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_on DATETIME,
    user_id INT(10),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

-- Create Comments table
CREATE TABLE Comments (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    post_id INT(10),
    name VARCHAR(100) NOT NULL,
    message TEXT,
    created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES Posts(id)
);
