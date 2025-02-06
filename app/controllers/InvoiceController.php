<?php

require_once __DIR__ . '/../models/Invoice.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Person.php';

class InvoiceController {
    public function index() {
        $invoices = Invoice::findAll();
        require_once __DIR__ . '/../views/invoices/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'];
            $customer_id = $_POST['customer_id'];
            $items = $_POST['items'];
            $total = $_POST['total'];
            $tax = $_POST['tax'];
            $discount = $_POST['discount'];

            Invoice::create($type, $customer_id, $items, $total, $tax, $discount);
            header('Location: /accounting_app/public/invoices');
            exit();
        }

        $products = Product::findAll();
        $customers = Person::findAll('customer');
        require_once __DIR__ . '/../views/invoices/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $items = $_POST['items'];
            $total = $_POST['total'];
            $tax = $_POST['tax'];
            $discount = $_POST['discount'];

            Invoice::update($id, $items, $total, $tax, $discount);
            header('Location: /accounting_app/public/invoices');
            exit();
        }

        $invoice = Invoice::findById($id);
        $products = Product::findAll();
        $customers = Person::findAll('customer');
        require_once __DIR__ . '/../views/invoices/edit.php';
    }

    public function delete($id) {
        Invoice::delete($id);
        header('Location: /accounting_app/public/invoices');
        exit();
    }
}