<?php

require_once __DIR__ . '/../core/Database.php';

class Setting {
    public static function get($key) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT value FROM settings
            WHERE `key` = :key
        ");
        $stmt->execute(['key' => $key]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['value'] : null;
    }

    public static function set($key, $value) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO settings (`key`, `value`)
            VALUES (:key, :value)
            ON DUPLICATE KEY UPDATE `value` = :value
        ");
        $stmt->execute([
            'key' => $key,
            'value' => $value
        ]);

        return $stmt->rowCount();
    }

    public static function getAll() {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM settings");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}