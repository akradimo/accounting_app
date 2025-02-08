<?php

require_once __DIR__ . '/../core/Database.php';

class Sale {
    public static function create($customer_id, $total_amount, $items) {
        $db = new Database();
        $conn = $db->connect();

        // شروع تراکنش
        $conn->beginTransaction();

        try {
            // ثبت فروش
            $stmt = $conn->prepare("
                INSERT INTO sales (customer_id, total_amount)
                VALUES (:customer_id, :total_amount)
            ");
            $stmt->execute([
                'customer_id' => $customer_id,
                'total_amount' => $total_amount
            ]);
            $sale_id = $conn->lastInsertId();

            // ثبت آیتم‌های فروش
            foreach ($items as $item) {
                $stmt = $conn->prepare("
                    INSERT INTO sale_items (sale_id, product_id, quantity, price)
                    VALUES (:sale_id, :product_id, :quantity, :price)
                ");
                $stmt->execute([
                    'sale_id' => $sale_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            // ثبت تراکنش
            $conn->commit();
            return $sale_id;
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
            SELECT s.*, p.name AS customer_name
            FROM sales s
            JOIN persons p ON s.customer_id = p.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT s.*, p.name AS customer_name
            FROM sales s
            JOIN persons p ON s.customer_id = p.id
            WHERE s.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getItems($sale_id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT si.*, pr.name AS product_name
            FROM sale_items si
            JOIN products pr ON si.product_id = pr.id
            WHERE si.sale_id = :sale_id
        ");
        $stmt->execute(['sale_id' => $sale_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}