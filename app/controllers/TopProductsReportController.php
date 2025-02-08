<?php

require_once __DIR__ . '/../models/TopProductsReport.php';

class TopProductsReportController {
    public function topProducts() {
        $report = TopProductsReport::getTopProductsReport();
        require_once __DIR__ . '/../views/reports/advanced/top_products.php';
    }
}