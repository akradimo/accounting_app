<?php

require_once __DIR__ . '/../core/Database.php';

class Notification {
    public static function create($userId, $message) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO notifications (user_id, message, created_at)
            VALUES (:user_id, :message, NOW())
        ");
        $stmt->execute([
            'user_id' => $userId,
            'message' => $message
        ]);

        return $conn->lastInsertId();
    }

    public static function findAll($userId) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM notifications
            WHERE user_id = :user_id
            ORDER BY created_at DESC
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function markAsRead($notificationId) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE notifications
            SET is_read = 1
            WHERE id = :id
        ");
        $stmt->execute(['id' => $notificationId]);

        return $stmt->rowCount();
    }
}