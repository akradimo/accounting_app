<?php

session_start();

class Auth {
    public static function login($userId) {
        $_SESSION['user_id'] = $userId;
    }

    public static function logout() {
        session_destroy();
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public static function getUserId() {
        return $_SESSION['user_id'] ?? null;
    }
}