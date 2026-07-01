<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=rotary_db', 'root', '');
    echo "Connected successfully to port 3307!";
} catch (PDOException $e) {
    echo "Failed on 3307: " . $e->getMessage();
}



