<?php

require_once __DIR__ . '/../core/Database.php';

class Income {
    public static function create($title, $amount, $description = null, $date = null) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO incomes (title, amount, description, date)
            VALUES (:title, :amount, :description, :date)
        ");
        $stmt->execute([
            'title' => $title,
            'amount' => $amount,
            'description' => $description,
            'date' => $date ?: date('Y-m-d H:i:s')
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM incomes ORDER BY date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM incomes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $title, $amount, $description = null, $date = null) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE incomes
            SET title = :title, amount = :amount, description = :description, date = :date
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'title' => $title,
            'amount' => $amount,
            'description' => $description,
            'date' => $date ?: date('Y-m-d H:i:s')
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}