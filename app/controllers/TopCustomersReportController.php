<?php

require_once __DIR__ . '/../models/TopCustomersReport.php';

class TopCustomersReportController {
    public function topCustomers() {
        $report = TopCustomersReport::getTopCustomersReport();
        require_once __DIR__ . '/../views/reports/advanced/top_customers.php';
    }
}