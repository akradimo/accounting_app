<?php

require_once __DIR__ . '/../core/Database.php';

class ProductModel {
    public static function create($name, $category, $barcode, $price, $stock) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO products (name, category, barcode, price, stock)
            VALUES (:name, :category, :barcode, :price, :stock)
        ");
        $stmt->execute([
            'name' => $name,
            'category' => $category,
            'barcode' => $barcode,
            'price' => $price,
            'stock' => $stock
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name, $category, $barcode, $price, $stock) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE products
            SET name = :name, category = :category, barcode = :barcode, price = :price, stock = :stock
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'category' => $category,
            'barcode' => $barcode,
            'price' => $price,
            'stock' => $stock
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}