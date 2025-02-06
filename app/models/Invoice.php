<?php

require_once __DIR__ . '/../core/Database.php';

class Invoice {
    public static function create($type, $customer_id, $items, $total, $tax, $discount) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO invoices (type, customer_id, items, total, tax, discount, created_at)
            VALUES (:type, :customer_id, :items, :total, :tax, :discount, NOW())
        ");
        $stmt->execute([
            'type' => $type,
            'customer_id' => $customer_id,
            'items' => json_encode($items),
            'total' => $total,
            'tax' => $tax,
            'discount' => $discount
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM invoices");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM invoices WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $items, $total, $tax, $discount) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE invoices
            SET items = :items, total = :total, tax = :tax, discount = :discount
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'items' => json_encode($items),
            'total' => $total,
            'tax' => $tax,
            'discount' => $discount
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM invoices WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}