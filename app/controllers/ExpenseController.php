<?php

require_once __DIR__ . '/../models/Expense.php';

if (!class_exists('ExpenseController')) {
    class ExpenseController {
    public function index() {
        $expenses = Expense::findAll();
        }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? null;
            $date = $_POST['date'] ?? null;

            Expense::create($title, $amount, $description, $date);
            header('Location: /accounting_app/public/expenses');
            exit;
        }
        require_once __DIR__ . '/../views/expenses/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? null;
            $date = $_POST['date'] ?? null;

            Expense::update($id, $title, $amount, $description, $date);
            header('Location: /accounting_app/public/expenses');
            exit;
        }

        $expense = Expense::findById($id);
        require_once __DIR__ . '/../views/expenses/edit.php';
    }

    public function delete($id) {
        Expense::delete($id);
        header('Location: /accounting_app/public/expenses');
        exit;
    }
    }
}