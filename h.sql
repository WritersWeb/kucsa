CREATE DATABASE my_database;
USE my_database;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255)
);