<?php

require_once __DIR__ . '/../models/Setting.php';

class SettingController {
    public function index() {
        $settings = [];
        $settings['company_name'] = Setting::get('company_name');
        $settings['currency'] = Setting::get('currency');
        require_once __DIR__ . '/../views/settings/index.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $company_name = $_POST['company_name'];
            $currency = $_POST['currency'];

            Setting::set('company_name', $company_name);
            Setting::set('currency', $currency);

            header('Location: /accounting_app/public/settings');
            exit;
        }
    }
}