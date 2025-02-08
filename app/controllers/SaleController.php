<?php

require_once __DIR__ . '/../models/Sale.php';
require_once __DIR__ . '/../models/Person.php';
require_once __DIR__ . '/../models/Product.php';

class SaleController {
    public function index() {
        $sales = Sale::findAll();
        require_once __DIR__ . '/../views/sales/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id'];
            $total_amount = $_POST['total_amount'];
            $items = json_decode($_POST['items'], true);

            Sale::create($customer_id, $total_amount, $items);
            header('Location: /accounting_app/public/sales');
            exit;
        }

        $customers = Person::findAll('customer');
        $products = Product::findAll();
        require_once __DIR__ . '/../views/sales/create.php';
    }

    public function view($id) {
        $sale = Sale::findById($id);
        $items = Sale::getItems($id);
        require_once __DIR__ . '/../views/sales/view.php';
    }
}