CREATE DATABASE IF NOT EXISTS rolliepods_db;
USE rolliepods_db;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('tenant', 'admin') NOT NULL DEFAULT 'tenant',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NULL,
    is_published BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_announcement_author
        FOREIGN KEY (author_id)
        REFERENCES users(user_id)
        ON DELETE SET NULL,

    INDEX idx_announcement_date (created_at)
);

CREATE TABLE inquiries (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,

    inquiry_type ENUM(
        'general',
        'maintenance'
    ) NOT NULL DEFAULT 'general',

    status ENUM(
        'pending',
        'in_progress',
        'resolved',
        'closed'
    ) NOT NULL DEFAULT 'pending',

    admin_response TEXT NULL,
    resolved_at DATETIME NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_inquiry_tenant
        FOREIGN KEY (tenant_id)
        REFERENCES users(user_id)
        ON DELETE RESTRICT,

    INDEX idx_inquiry_tenant (tenant_id),
    INDEX idx_inquiry_status (status),
    INDEX idx_inquiry_type (inquiry_type),
    INDEX idx_inquiry_date (created_at)
);