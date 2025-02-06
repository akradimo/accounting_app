<?php

require_once __DIR__ . '/../models/Report.php';

class ReportController {
    public function salesReport() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $sales = Report::getSalesReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/sales_report.php';
            return;
        }

        require_once __DIR__ . '/../views/reports/sales_report_form.php';
    }

    public function purchaseReport() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $purchases = Report::getPurchaseReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/purchase_report.php';
            return;
        }

        require_once __DIR__ . '/../views/reports/purchase_report_form.php';
    }
}