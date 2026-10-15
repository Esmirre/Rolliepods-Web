CREATE DATABASE IF NOT EXISTS rolliepods_db;
USE rolliepods_db;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,              -- the username
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,                 -- bcrypt hash
    role ENUM('tenant', 'admin') NOT NULL DEFAULT 'tenant',
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE posts (                                -- announcements
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NULL,
    card_color ENUM('orange', 'blue', 'green') NOT NULL DEFAULT 'orange',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX posts_created_at_index (created_at)
);

CREATE TABLE inquiries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    type ENUM('general', 'maintenance') NOT NULL DEFAULT 'general',
    message TEXT NOT NULL,
    status ENUM('pending', 'in_progress', 'resolved') NOT NULL DEFAULT 'pending',
    resolved_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX inquiries_status_index (status),
    CONSTRAINT inquiries_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
