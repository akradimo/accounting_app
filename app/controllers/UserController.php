<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    public function index() {
        $users = User::findAll();
        require_once __DIR__ . '/../views/users/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'] ?? 'user';

            User::create($username, $password, $role);
            header('Location: /accounting_app/public/users');
            exit;
        }
        require_once __DIR__ . '/../views/users/create.php';
    }

    public function delete($id) {
        User::delete($id);
        header('Location: /accounting_app/public/users');
        exit;
    }
}