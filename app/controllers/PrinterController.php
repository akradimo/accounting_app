<?php

require_once __DIR__ . '/../models/Printer.php';
require_once __DIR__ . '/../models/Invoice.php';

class PrinterController {
    public function print($invoiceId) {
        $invoice = Invoice::findById($invoiceId);
        if ($invoice) {
            Printer::printInvoice($invoiceId);
            echo "فاکتور با موفقیت چاپ شد.";
        } else {
            echo "فاکتور مورد نظر یافت نشد.";
        }
    }
}