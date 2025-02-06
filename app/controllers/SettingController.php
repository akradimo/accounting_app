<?php

require_once __DIR__ . '/../models/Setting.php';

class SettingController {
    public function index() {
        $settings = Setting::getAll();
        require_once __DIR__ . '/../views/settings/index.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                Setting::set($key, $value);
            }
            header('Location: /accounting_app/public/settings');
            exit();
        }
    }
}