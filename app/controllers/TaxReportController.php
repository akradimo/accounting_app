<?php

require_once __DIR__ . '/../models/TaxReport.php';

class TaxReportController {
    public function tax() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = TaxReport::getTaxReport($startDate, $endDate);
            require_once __DIR__ . '/../views/reports/advanced/tax.php';
            return;
        }

        require_once __DIR__ . '/../views/reports/advanced/tax_form.php';
    }
}