<?php

require_once __DIR__ . '/../models/Receipt.php';

class ReceiptController {
    public function index() {
        $receipts = Receipt::getAll();
        require_once __DIR__ . '/../views/receipts/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'person_id' => $_POST['person_id'],
                'amount' => $_POST['amount'],
                'date' => $_POST['date'],
                'description' => $_POST['description']
            ];

            Receipt::create($data);
            header("Location: /accounting_app/public/receipts");
            exit;
        }
        require_once __DIR__ . '/../views/receipts/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'person_id' => $_POST['person_id'],
                'amount' => $_POST['amount'],
                'date' => $_POST['date'],
                'description' => $_POST['description']
            ];

            Receipt::update($id, $data);
            header("Location: /accounting_app/public/receipts");
            exit;
        }

        $receipt = Receipt::getById($id);
        require_once __DIR__ . '/../views/receipts/edit.php';
    }

    public function delete($id) {
        Receipt::delete($id);
        header("Location: /accounting_app/public/receipts");
        exit;
    }
}