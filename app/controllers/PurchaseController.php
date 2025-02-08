<?php

require_once __DIR__ . '/../models/Purchase.php';
require_once __DIR__ . '/../models/Person.php';
require_once __DIR__ . '/../models/Product.php';

class PurchaseController {
    public function index() {
        $purchases = Purchase::findAll();
        require_once __DIR__ . '/../views/purchases/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $supplier_id = $_POST['supplier_id'];
            $total_amount = $_POST['total_amount'];
            $items = json_decode($_POST['items'], true);

            Purchase::create($supplier_id, $total_amount, $items);
            header('Location: /accounting_app/public/purchases');
            exit;
        }

        $suppliers = Person::findAll('supplier');
        $products = Product::findAll();
        require_once __DIR__ . '/../views/purchases/create.php';
    }

    public function view($id) {
        $purchase = Purchase::findById($id);
        $items = Purchase::getItems($id);
        require_once __DIR__ . '/../views/purchases/view.php';
    }
}