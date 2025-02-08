<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "
CREATE TABLE IF NOT EXISTS permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    module VARCHAR(100) NOT NULL,
    access ENUM('read', 'write', 'delete') DEFAULT 'read',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($sql);
echo "جدول permissions با موفقیت ایجاد شد.";