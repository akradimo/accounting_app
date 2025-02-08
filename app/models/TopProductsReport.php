<?php

require_once __DIR__ . '/../core/Database.php';

class TopProductsReport {
    public static function getTopProductsReport($limit = 10) {
        $db = new Database();
        $conn = $db->connect();

        // محاسبه محصولات پرفروش بر اساس تعداد فروش
        $stmt = $conn->prepare("
            SELECT 
                p.id AS product_id,
                p.name AS product_name,
                SUM(ii.quantity) AS total_sold
            FROM products p
            LEFT JOIN invoice_items ii ON p.id = ii.product_id
            LEFT JOIN invoices i ON ii.invoice_id = i.id
            WHERE i.type = 'sale'
            GROUP BY p.id, p.name
            ORDER BY total_sold DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}