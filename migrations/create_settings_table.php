<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

$sql = "
CREATE TABLE IF NOT EXISTS settings (
    `key` VARCHAR(100) PRIMARY KEY,
    `value` TEXT NOT NULL
)";

$conn->exec($sql);
echo "جدول settings با موفقیت ایجاد شد.";