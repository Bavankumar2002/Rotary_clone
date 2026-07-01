<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=rotary_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT IGNORE INTO settings (setting_key, setting_value) VALUES 
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
    ('stat_beneficiaries', '10000');";

    $pdo->exec($sql);
    echo "Settings injected successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
