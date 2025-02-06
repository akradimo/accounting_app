<?php

require_once __DIR__ . '/../core/Database.php';

class Report {
    public static function getProfitLossReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        // محاسبه کل فروش‌ها
        $stmt = $conn->prepare("
            SELECT SUM(total) AS total_sales
            FROM invoices
            WHERE type = 'sale' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $sales = $stmt->fetch(PDO::FETCH_ASSOC);

        // محاسبه کل خریدها
        $stmt = $conn->prepare("
            SELECT SUM(total) AS total_purchases
            FROM invoices
            WHERE type = 'purchase' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $purchases = $stmt->fetch(PDO::FETCH_ASSOC);

        // محاسبه سود و زیان
        $profitLoss = [
            'total_sales' => $sales['total_sales'] ?? 0,
            'total_purchases' => $purchases['total_purchases'] ?? 0,
            'profit_loss' => ($sales['total_sales'] ?? 0) - ($purchases['total_purchases'] ?? 0)
        ];

        return $profitLoss;
    }
}