<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

try {
    // ایجاد جدول purchase_items
    $sql = "
    CREATE TABLE IF NOT EXISTS purchase_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        purchase_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (purchase_id) REFERENCES purchases(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    )";
    $conn->exec($sql);
    echo "جدول purchase_items با موفقیت ایجاد شد.\n";
} catch (PDOException $e) {
    echo "خطا در ایجاد جدول purchase_items: " . $e->getMessage() . "\n";
}