<?php

require_once __DIR__ . '/../models/Notification.php';

class NotificationController {
    public function index() {
        $userId = Auth::getUserId(); // فرض می‌کنیم که کاربر وارد سیستم است.
        $notifications = Notification::findAll($userId);
        require_once __DIR__ . '/../views/notifications/index.php';
    }

    public function markAsRead($notificationId) {
        Notification::markAsRead($notificationId);
        header('Location: /accounting_app/public/notifications');
        exit();
    }
}