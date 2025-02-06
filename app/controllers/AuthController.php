<?php

require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                Auth::login($user['id']);
                header('Location: /dashboard');
                exit();
            } else {
                echo 'نام کاربری یا رمز عبور اشتباه است.';
            }
        }

        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        Auth::logout();
        header('Location: /login');
        exit();
    }
}