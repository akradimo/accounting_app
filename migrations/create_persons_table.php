<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "
CREATE TABLE IF NOT EXISTS persons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('customer', 'supplier') NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($sql);
echo "جدول persons با موفقیت ایجاد شد.";