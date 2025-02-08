<?php

require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$conn = $db->connect();

try {
    // ایجاد جدول sale_items
    $sql = "
    CREATE TABLE IF NOT EXISTS sale_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        sale_id INT NOT NULL,
        product_id INT NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (sale_id) REFERENCES sales(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    )";
    $conn->exec($sql);
    echo "جدول sale_items با موفقیت ایجاد شد.\n";
} catch (PDOException $e) {
    echo "خطا در ایجاد جدول sale_items: " . $e->getMessage() . "\n";
}