<?php

require_once __DIR__ . '/../core/Database.php';

class Purchase {
    public static function create($supplier_id, $total_amount, $items) {
        $db = new Database();
        $conn = $db->connect();

        // شروع تراکنش
        $conn->beginTransaction();

        try {
            // ثبت خرید
            $stmt = $conn->prepare("
                INSERT INTO purchases (supplier_id, total_amount)
                VALUES (:supplier_id, :total_amount)
            ");
            $stmt->execute([
                'supplier_id' => $supplier_id,
                'total_amount' => $total_amount
            ]);
            $purchase_id = $conn->lastInsertId();

            // ثبت آیتم‌های خرید
            foreach ($items as $item) {
                $stmt = $conn->prepare("
                    INSERT INTO purchase_items (purchase_id, product_id, quantity, price)
                    VALUES (:purchase_id, :product_id, :quantity, :price)
                ");
                $stmt->execute([
                    'purchase_id' => $purchase_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            // ثبت تراکنش
            $conn->commit();
            return $purchase_id;
        } catch (Exception $e) {
            // بازگشت از تراکنش در صورت خطا
            $conn->rollBack();
            throw $e;
        }
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT p.*, s.name AS supplier_name
            FROM purchases p
            JOIN persons s ON p.supplier_id = s.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT p.*, s.name AS supplier_name
            FROM purchases p
            JOIN persons s ON p.supplier_id = s.id
            WHERE p.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getItems($purchase_id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT pi.*, pr.name AS product_name
            FROM purchase_items pi
            JOIN products pr ON pi.product_id = pr.id
            WHERE pi.purchase_id = :purchase_id
        ");
        $stmt->execute(['purchase_id' => $purchase_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}