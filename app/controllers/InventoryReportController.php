<?php

require_once __DIR__ . '/../models/InventoryReport.php';

class InventoryReportController {
    public function inventory() {
        $report = InventoryReport::getInventoryReport();
        require_once __DIR__ . '/../views/reports/advanced/inventory.php';
    }
}