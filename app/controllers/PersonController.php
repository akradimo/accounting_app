<?php

require_once __DIR__ . '/../models/Person.php';

class PersonController {
    public function index() {
        $persons = Person::findAll(); // دریافت لیست اشخاص از مدل
        require_once __DIR__ . '/../views/persons/index.php'; // بارگذاری ویو
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            Person::create($name, $type, $phone, $email, $address);
            header('Location: /accounting_app/public/persons');
            exit();
        }

        require_once __DIR__ . '/../views/persons/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];

            Person::update($id, $name, $phone, $email, $address);
            header('Location: /accounting_app/public/persons');
            exit();
        }

        $person = Person::findById($id);
        require_once __DIR__ . '/../views/persons/edit.php';
    }

    public function delete($id) {
        Person::delete($id);
        header('Location: /accounting_app/public/persons');
        exit();
    }
}