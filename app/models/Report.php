<?php

require_once __DIR__ . '/../core/Database.php';

class Report {
    public static function getSalesReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT SUM(total_amount) AS total_sales
            FROM sales
            WHERE created_at BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getExpensesReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT SUM(amount) AS total_expenses
            FROM expenses
            WHERE date BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getIncomesReport($startDate, $endDate) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT SUM(amount) AS total_incomes
            FROM incomes
            WHERE date BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}