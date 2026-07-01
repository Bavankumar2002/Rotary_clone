-- Database for Rotary Club of Madurai
CREATE DATABASE IF NOT EXISTS rotary_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rotary_db;

-- Admins Table
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Editor', 'Content Manager') DEFAULT 'Admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Members Table
CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    classification VARCHAR(255),
    join_date DATE,
    image_url VARCHAR(255),
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Leadership Table
CREATE TABLE leadership (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    position VARCHAR(255) NOT NULL,
    rotary_year VARCHAR(50) NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE SET NULL
);

-- Presidents Table (Past Presidents)
CREATE TABLE presidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rotary_year VARCHAR(50) NOT NULL,
    image_url VARCHAR(255)
);

-- Projects Table
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    content LONGTEXT,
    image_url VARCHAR(255),
    category VARCHAR(100),
    project_date DATE,
    status ENUM('Completed', 'Ongoing', 'Planned') DEFAULT 'Completed',
    beneficiaries_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Events Table
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    content LONGTEXT,
    event_date DATETIME NOT NULL,
    location VARCHAR(255),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Blog Categories Table
CREATE TABLE blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE
);

-- Blogs Table
CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    image_url VARCHAR(255),
    author_id INT,
    status ENUM('Draft', 'Published') DEFAULT 'Draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL,
    FOREIGN KEY (author_id) REFERENCES admins(id) ON DELETE SET NULL
);

-- Gallery Table
CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image_url VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Settings Table (Site Settings)
CREATE TABLE settings (
    setting_key VARCHAR(100) PRIMARY KEY,
    setting_value TEXT
);

-- Insert Default Admin
INSERT INTO admins (name, email, password, role) VALUES 
('Super Admin', 'admin@rotarymadurai.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin');
-- default password is 'password'

-- Insert basic settings
INSERT INTO settings (setting_key, setting_value) VALUES
('site_name', 'Rotary Club of Madurai'),
('contact_email', 'info@rotaryclubofmadurai.org'),
('contact_phone', '+91 1234567890'),
('motto', 'Service Above Self'),
('hero_title', 'Welcome to Rotary Club of Madurai'),
('hero_subtitle', 'Join us in making a difference in our community and around the world.'),
('about_mission', 'Our mission is to provide service to others, promote integrity, and advance world understanding, goodwill, and peace through our fellowship of business, professional, and community leaders.'),
('stat_members', '150'),
('stat_projects', '54'),
('stat_years', '85'),
('stat_beneficiaries', '10000');
