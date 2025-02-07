<?php

require_once __DIR__ . '/../core/Database.php';

class Printer {
    public static function printInvoice($invoiceId) {
        // این بخش باید با توجه به دستگاه چاپگر شما پیاده‌سازی شود.
        // مثلاً از کتابخانه‌هایی مانند `escpos-php` استفاده کنید.
        return true;
    }
}