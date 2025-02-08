<?php

require_once __DIR__ . '/../core/Database.php';

class Payment {
    public static function create($invoiceId, $amount, $status) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO payments (invoice_id, amount, status, created_at)
            VALUES (:invoice_id, :amount, :status, NOW())
        ");
        $stmt->execute([
            'invoice_id' => $invoiceId,
            'amount' => $amount,
            'status' => $status
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM payments");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM payments WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}