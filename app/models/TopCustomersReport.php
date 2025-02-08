<?php

require_once __DIR__ . '/../core/Database.php';

class TopCustomersReport {
    public static function getTopCustomersReport($limit = 10) {
        $db = new Database();
        $conn = $db->connect();

        // محاسبه مشتریان برتر بر اساس مجموع خریدها
        $stmt = $conn->prepare("
            SELECT 
                c.id AS customer_id,
                c.name AS customer_name,
                SUM(i.total) AS total_purchases
            FROM customers c
            LEFT JOIN invoices i ON c.id = i.customer_id
            WHERE i.type = 'sale'
            GROUP BY c.id, c.name
            ORDER BY total_purchases DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}