<?php

require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Invoice.php';

class PaymentController {
    public function index() {
        $payments = Payment::findAll();
        require_once __DIR__ . '/../views/payments/index.php';
    }

    public function create($invoiceId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $status = 'pending'; // وضعیت پرداخت به صورت پیش‌فرض "در انتظار" است.

            Payment::create($invoiceId, $amount, $status);
            header('Location: /accounting_app/public/payments');
            exit();
        }

        $invoice = Invoice::findById($invoiceId);
        require_once __DIR__ . '/../views/payments/create.php';
    }

    public function processPayment($paymentId) {
        // این بخش باید با توجه به درگاه پرداخت شما پیاده‌سازی شود.
        // مثلاً از کتابخانه‌هایی مانند `zarinpal-php` استفاده کنید.
        $payment = Payment::findById($paymentId);
        if ($payment) {
            // پرداخت را انجام دهید و وضعیت را به "موفق" تغییر دهید.
            Payment::updateStatus($paymentId, 'completed');
            echo "پرداخت با موفقیت انجام شد.";
        } else {
            echo "پرداخت مورد نظر یافت نشد.";
        }
    }
}