<?php

require_once __DIR__ . '/../models/Bank.php';

class BankController {
    public function index() {
        $banks = Bank::findAll();
        require_once __DIR__ . '/../views/banks/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $account_number = $_POST['account_number'];
            $balance = $_POST['balance'];

            Bank::create($name, $account_number, $balance);
            header('Location: /accounting_app/public/banks');
            exit;
        }
        require_once __DIR__ . '/../views/banks/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $account_number = $_POST['account_number'];
            $balance = $_POST['balance'];

            Bank::update($id, $name, $account_number, $balance);
            header('Location: /accounting_app/public/banks');
            exit;
        }

        $bank = Bank::findById($id);
        require_once __DIR__ . '/../views/banks/edit.php';
    }

    public function delete($id) {
        Bank::delete($id);
        header('Location: /accounting_app/public/banks');
        exit;
    }
}