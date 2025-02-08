<?php

require_once __DIR__ . '/../core/Database.php';

class Person {
    public static function create($data) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO persons (company, first_name, last_name, display_name, category, type, financial_credit, price_list, tax_type, national_code, economic_code, registration_number, branch_code, description)
            VALUES (:company, :first_name, :last_name, :display_name, :category, :type, :financial_credit, :price_list, :tax_type, :national_code, :economic_code, :registration_number, :branch_code, :description)
        ");
        $stmt->execute($data);
        return $conn->lastInsertId();
    }

    public static function getAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM persons");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM persons WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data) {
        $db = new Database();
        $conn = $db->connect();

        $data['id'] = $id;
        $stmt = $conn->prepare("
            UPDATE persons
            SET company = :company, first_name = :first_name, last_name = :last_name, display_name = :display_name, category = :category, type = :type, financial_credit = :financial_credit, price_list = :price_list, tax_type = :tax_type, national_code = :national_code, economic_code = :economic_code, registration_number = :registration_number, branch_code = :branch_code, description = :description
            WHERE id = :id
        ");
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM persons WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}