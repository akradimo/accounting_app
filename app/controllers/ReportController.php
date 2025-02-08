<?php

require_once __DIR__ . '/../models/Report.php';

class ReportController {
    public function sales() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = Report::getSalesReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/sales.php';
            return;
        }
        require_once __DIR__ . '/../views/reports/sales_form.php';
    }

    public function expenses() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = Report::getExpensesReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/expenses.php';
            return;
        }
        require_once __DIR__ . '/../views/reports/expenses_form.php';
    }

    public function incomes() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = Report::getIncomesReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/incomes.php';
            return;
        }
        require_once __DIR__ . '/../views/reports/incomes_form.php';
    }
}