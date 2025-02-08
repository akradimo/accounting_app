<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "
CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->exec($sql);
echo "جدول notifications با موفقیت ایجاد شد.";