<?php

require_once __DIR__ . '/../core/Database.php';

class Dashboard {
    public static function getSalesSummary() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT SUM(total) AS total_sales, COUNT(*) AS total_orders
            FROM invoices
            WHERE type = 'sale'
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPurchaseSummary() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT SUM(total) AS total_purchases, COUNT(*) AS total_orders
            FROM invoices
            WHERE type = 'purchase'
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getLowStockCount() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT COUNT(*) AS low_stock_count
            FROM products
            WHERE stock <= 10
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}