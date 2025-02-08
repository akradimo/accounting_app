<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

try {
    // ایجاد جدول users
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(50) DEFAULT 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "جدول users با موفقیت ایجاد شد.\n";
} catch (PDOException $e) {
    echo "خطا در ایجاد جدول users: " . $e->getMessage() . "\n";
}