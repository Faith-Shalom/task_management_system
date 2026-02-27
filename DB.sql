-- Create database
CREATE DATABASE task_management_db;

-- Select the database to use
USE task_management_db;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each user

    full_name VARCHAR(50) NOT NULL,    -- User full name

    username VARCHAR(50) NOT NULL UNIQUE, -- Username (must be unique)

    password VARCHAR(255) NOT NULL,    -- Hashed password (important)

    role ENUM('admin', 'employee') NOT NULL, -- User role

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Auto date created
);