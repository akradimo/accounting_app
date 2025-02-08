<?php

require_once __DIR__ . '/../models/Permission.php';
require_once __DIR__ . '/../models/Role.php';

class PermissionController {
    public function index($roleId) {
        $permissions = Permission::findByRole($roleId);
        $role = Role::findById($roleId);
        require_once __DIR__ . '/../views/permissions/index.php';
    }

    public function update($permissionId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $access = $_POST['access'];

            Permission::update($permissionId, $access);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function delete($permissionId) {
        Permission::delete($permissionId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}