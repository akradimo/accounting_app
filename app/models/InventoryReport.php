<?php

require_once __DIR__ . '/../core/Database.php';

class InventoryReport {
    public static function getInventoryReport() {
        $db = new Database();
        $conn = $db->connect();

        // محاسبه موجودی کالا بر اساس خریدها و فروش‌ها
        $stmt = $conn->prepare("
            SELECT 
                p.id AS product_id,
                p.name AS product_name,
                COALESCE(SUM(CASE WHEN i.type = 'purchase' THEN ii.quantity ELSE 0 END), 0) AS total_purchased,
                COALESCE(SUM(CASE WHEN i.type = 'sale' THEN ii.quantity ELSE 0 END), 0) AS total_sold,
                (COALESCE(SUM(CASE WHEN i.type = 'purchase' THEN ii.quantity ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN i.type = 'sale' THEN ii.quantity ELSE 0 END), 0)) AS current_stock
            FROM products p
            LEFT JOIN invoice_items ii ON p.id = ii.product_id
            LEFT JOIN invoices i ON ii.invoice_id = i.id
            GROUP BY p.id, p.name
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}