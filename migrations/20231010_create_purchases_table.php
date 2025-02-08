<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

try {
    // ایجاد جدول purchases
    $sql = "
    CREATE TABLE IF NOT EXISTS purchases (
        id INT AUTO_INCREMENT PRIMARY KEY,
        supplier_id INT NOT NULL,
        total_amount DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (supplier_id) REFERENCES persons(id)
    )";
    $conn->exec($sql);
    echo "جدول purchases با موفقیت ایجاد شد.\n";
} catch (PDOException $e) {
    echo "خطا در ایجاد جدول purchases: " . $e->getMessage() . "\n";
}