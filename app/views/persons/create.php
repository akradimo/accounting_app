<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن شخص جدید</title>
</head>
<body>
    <h1>افزودن شخص جدید</h1>
    <form method="POST" action="/persons/create">
        <label for="name">نام:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="type">نوع:</label>
        <select id="type" name="type" required>
            <option value="customer">مشتری</option>
            <option value="supplier">تأمین‌کننده</option>
        </select>
        <br>
        <label for="phone">تلفن:</label>
        <input type="text" id="phone" name="phone">
        <br>
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="address">آدرس:</label>
        <textarea id="address" name="address"></textarea>
        <br>
        <button type="submit">ذخیره</button>
    </form>
</body>
</html>