<?php

require_once __DIR__ . '/../models/Dashboard.php';

class DashboardController {
    public function index() {
        $salesSummary = Dashboard::getSalesSummary();
        $purchaseSummary = Dashboard::getPurchaseSummary();
        $lowStockCount = Dashboard::getLowStockCount();

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}