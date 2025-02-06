<?php

require_once __DIR__ . '/../core/Database.php';

class Inventory {
    public static function updateStock($productId, $quantity) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE products
            SET stock = stock + :quantity
            WHERE id = :product_id
        ");
        $stmt->execute([
            'product_id' => $productId,
            'quantity' => $quantity
        ]);

        return $stmt->rowCount();
    }

    public static function getLowStockProducts($threshold = 10) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM products
            WHERE stock <= :threshold
        ");
        $stmt->execute(['threshold' => $threshold]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getStockHistory($productId) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM stock_history
            WHERE product_id = :product_id
            ORDER BY created_at DESC
        ");
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}