<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

try {
    // ایجاد جدول persons
    $sql = "
    CREATE TABLE IF NOT EXISTS persons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        company VARCHAR(100) NOT NULL,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        display_name VARCHAR(100) NOT NULL,
        category VARCHAR(50) NOT NULL,
        type VARCHAR(50) NOT NULL,
        financial_credit DECIMAL(10, 2) NOT NULL,
        price_list VARCHAR(50) NOT NULL,
        tax_type VARCHAR(50) NOT NULL,
        national_code VARCHAR(20) NOT NULL,
        economic_code VARCHAR(20) NOT NULL,
        registration_number VARCHAR(20) NOT NULL,
        branch_code VARCHAR(4) NOT NULL,
        description TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "جدول persons با موفقیت ایجاد شد.\n";
} catch (PDOException $e) {
    echo "خطا در ایجاد جدول persons: " . $e->getMessage() . "\n";
}