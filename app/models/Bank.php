<?php

require_once __DIR__ . '/../core/Database.php';

class Bank {
    public static function create($name, $account_number, $balance) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO banks (name, account_number, balance)
            VALUES (:name, :account_number, :balance)
        ");
        $stmt->execute([
            'name' => $name,
            'account_number' => $account_number,
            'balance' => $balance
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM banks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM banks WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name, $account_number, $balance) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE banks
            SET name = :name, account_number = :account_number, balance = :balance
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'account_number' => $account_number,
            'balance' => $balance
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM banks WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}