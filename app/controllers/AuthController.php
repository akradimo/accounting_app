<?php  

require_once __DIR__ . '/../core/Auth.php';  
require_once __DIR__ . '/../models/User.php';  

class AuthController {  
    public function register() {  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $username = $_POST['username'];  
            $password = $_POST['password'];  

            // بررسی وجود کاربر با همین نام کاربری  
            $existingUser = User::findByUsername($username);  
            if ($existingUser) {  
                echo 'نام کاربری قبلاً استفاده شده است.';  
                return;  
            }  

            // ایجاد کاربر جدید  
            $userId = User::create($username, password_hash($password, PASSWORD_BCRYPT));  

            if ($userId) {  
                Auth::login($userId);  
                header('Location: /dashboard');  
                exit();  
            } else {  
                echo 'خطا در ثبت‌نام کاربر.';  
            }  
        }  

        require_once __DIR__ . '/../views/auth/register.php';  
    }  

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