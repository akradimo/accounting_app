<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود به سیستم</title>
</head>
<body>
    <h1>ورود به سیستم</h1>
    <form method="POST" action="/login">
        <label for="username">نام کاربری:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">ورود</button>
    </form>
</body>
</html>