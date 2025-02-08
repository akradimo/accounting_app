<?php

require_once __DIR__ . '/../models/Income.php';

class IncomeController {
    public function index() {
        $incomes = Income::findAll();
        require_once __DIR__ . '/../views/incomes/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? null;
            $date = $_POST['date'] ?? null;

            Income::create($title, $amount, $description, $date);
            header('Location: /accounting_app/public/incomes');
            exit;
        }
        require_once __DIR__ . '/../views/incomes/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? null;
            $date = $_POST['date'] ?? null;

            Income::update($id, $title, $amount, $description, $date);
            header('Location: /accounting_app/public/incomes');
            exit;
        }

        $income = Income::findById($id);
        require_once __DIR__ . '/../views/incomes/edit.php';
    }

    public function delete($id) {
        Income::delete($id);
        header('Location: /accounting_app/public/incomes');
        exit;
    }
}