<?php

require_once __DIR__ . '/../core/Database.php';

class User {
    public static function create($username, $password, $role = 'user') {
        $db = new Database();
        $conn = $db->connect();

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("
            INSERT INTO users (username, password, role)
            VALUES (:username, :password, :role)
        ");
        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role
        ]);

        return $conn->lastInsertId();
    }

    public static function findByUsername($username) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function verifyPassword($username, $password) {
        $user = self::findByUsername($username);
        return $user && password_verify($password, $user['password']);
    }

    public static function findAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}