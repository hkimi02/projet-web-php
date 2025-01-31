CREATE DATABASE company_db;
USE company_db;
    -- Users table (for both superadmin and employees)
CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       role ENUM('superadmin', 'employee') DEFAULT 'employee',
                       status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert superadmin (username: admin, password: admin123)
-- Password is hashed using password_hash() in PHP
INSERT INTO users (username, password, email, role, status)
VALUES ('admin', '$2y$10$OxCYrkm9Cti99d/Urvqfs.iYozirczJinOwr2k086pFQrtos2tm7e', 'admin@example.com', 'superadmin', 'approved');

-- Invoices table
CREATE TABLE invoices (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          user_id INT,
                          invoice_number VARCHAR(50) NOT NULL,
                          amount DECIMAL(10, 2) NOT NULL,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Products table
CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(100) NOT NULL,
                          price DECIMAL(10, 2) NOT NULL,
                          description TEXT,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);