<?php

require_once __DIR__ . '/../core/Database.php';

class TaxReport {
    public static function getTaxReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        // محاسبه مالیات بر اساس فروش‌ها
        $stmt = $conn->prepare("
            SELECT 
                SUM(total) AS total_sales,
                SUM(total * 0.09) AS sales_tax
            FROM invoices
            WHERE type = 'sale' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $salesTax = $stmt->fetch(PDO::FETCH_ASSOC);

        // محاسبه مالیات بر اساس خریدها
        $stmt = $conn->prepare("
            SELECT 
                SUM(total) AS total_purchases,
                SUM(total * 0.09) AS purchase_tax
            FROM invoices
            WHERE type = 'purchase' AND created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        $purchaseTax = $stmt->fetch(PDO::FETCH_ASSOC);

        // محاسبه مالیات خالص
        $netTax = [
            'total_sales' => $salesTax['total_sales'] ?? 0,
            'sales_tax' => $salesTax['sales_tax'] ?? 0,
            'total_purchases' => $purchaseTax['total_purchases'] ?? 0,
            'purchase_tax' => $purchaseTax['purchase_tax'] ?? 0,
            'net_tax' => ($salesTax['sales_tax'] ?? 0) - ($purchaseTax['purchase_tax'] ?? 0)
        ];

        return $netTax;
    }
}