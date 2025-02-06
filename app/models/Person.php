<?php

require_once __DIR__ . '/../core/Database.php';

class Person {
    public static function create($name, $type, $phone = null, $email = null, $address = null) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO persons (name, type, phone, email, address)
            VALUES (:name, :type, :phone, :email, :address)
        ");
        $stmt->execute([
            'name' => $name,
            'type' => $type,
            'phone' => $phone,
            'email' => $email,
            'address' => $address
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll($type = null) {
        $db = new Database();
        $conn = $db->connect();

        $sql = "SELECT * FROM persons";
        if ($type) {
            $sql .= " WHERE type = :type";
        }
        $stmt = $conn->prepare($sql);

        if ($type) {
            $stmt->execute(['type' => $type]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM persons WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name, $phone = null, $email = null, $address = null) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE persons
            SET name = :name, phone = :phone, email = :email, address = :address
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM persons WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}