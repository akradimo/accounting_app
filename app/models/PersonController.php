<?php

require_once __DIR__ . '/../models/Person.php';

class PersonController {
    public function index() {
        $persons = Person::getAll();
        require_once __DIR__ . '/../views/persons/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'company' => $_POST['company'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'display_name' => $_POST['display_name'],
                'category' => $_POST['category'],
                'type' => $_POST['type'],
                'financial_credit' => $_POST['financial_credit'],
                'price_list' => $_POST['price_list'],
                'tax_type' => $_POST['tax_type'],
                'national_code' => $_POST['national_code'],
                'economic_code' => $_POST['economic_code'],
                'registration_number' => $_POST['registration_number'],
                'branch_code' => $_POST['branch_code'],
                'description' => $_POST['description']
            ];

            $personId = Person::create($data);
            header("Location: /accounting_app/public/persons");
            exit;
        }
        require_once __DIR__ . '/../views/persons/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'company' => $_POST['company'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'display_name' => $_POST['display_name'],
                'category' => $_POST['category'],
                'type' => $_POST['type'],
                'financial_credit' => $_POST['financial_credit'],
                'price_list' => $_POST['price_list'],
                'tax_type' => $_POST['tax_type'],
                'national_code' => $_POST['national_code'],
                'economic_code' => $_POST['economic_code'],
                'registration_number' => $_POST['registration_number'],
                'branch_code' => $_POST['branch_code'],
                'description' => $_POST['description']
            ];

            Person::update($id, $data);
            header("Location: /accounting_app/public/persons");
            exit;
        }

        $person = Person::getById($id);
        require_once __DIR__ . '/../views/persons/edit.php';
    }

    public function delete($id) {
        Person::delete($id);
        header("Location: /accounting_app/public/persons");
        exit;
    }
}