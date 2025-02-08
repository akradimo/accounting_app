<?php

require_once __DIR__ . '/../models/AdvancedReport.php';

class AdvancedReportController {
    public function profitLoss() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = AdvancedReport::getProfitLossReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/advanced/profit_loss.php';
            return;
        }

        require_once __DIR__ . '/../views/reports/advanced/profit_loss_form.php';
    }

    public function salesTrend() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $trend = AdvancedReport::getSalesTrend($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/advanced/sales_trend.php';
            return;
        }

        require_once __DIR__ . '/../views/reports/advanced/sales_trend_form.php';
    }
}