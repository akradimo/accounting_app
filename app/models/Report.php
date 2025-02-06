<?php

require_once __DIR__ . '/../core/Database.php';

class Report {
    public static function getSalesReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM invoices
            WHERE type = 'sale' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPurchaseReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM invoices
            WHERE type = 'purchase' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}