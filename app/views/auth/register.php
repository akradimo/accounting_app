<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام</title>
</head>
<body>
    <h1>ثبت‌نام</h1>
    <form method="POST" action="/register">
        <label for="username">نام کاربری:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">ثبت‌نام</button>
    </form>
    <p>قبلاً حساب کاربری دارید؟ <a href="/login">وارد شوید</a></p>
</body>
</html>