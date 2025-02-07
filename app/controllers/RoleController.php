<?php

require_once __DIR__ . '/../models/Role.php';

class RoleController {
    public function index() {
        $roles = Role::findAll();
        require_once __DIR__ . '/../views/roles/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $permissions = $_POST['permissions'];

            Role::create($name, $permissions);
            header('Location: /accounting_app/public/roles');
            exit();
        }

        require_once __DIR__ . '/../views/roles/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $permissions = $_POST['permissions'];

            Role::update($id, $name, $permissions);
            header('Location: /accounting_app/public/roles');
            exit();
        }

        $role = Role::findById($id);
        require_once __DIR__ . '/../views/roles/edit.php';
    }

    public function delete($id) {
        Role::delete($id);
        header('Location: /accounting_app/public/roles');
        exit();
    }
}