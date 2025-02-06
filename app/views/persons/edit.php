<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش شخص</title>
</head>
<body>
    <h1>ویرایش شخص</h1>
    <form method="POST" action="/persons/edit/<?= $person['id'] ?>">
        <label for="name">نام:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($person['name']) ?>" required>
        <br>
        <label for="phone">تلفن:</label>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($person['phone']) ?>">
        <br>
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($person['email']) ?>">
        <br>
        <label for="address">آدرس:</label>
        <textarea id="address" name="address"><?= htmlspecialchars($person['address']) ?></textarea>
        <br>
        <button type="submit">ذخیره</button>
    </form>
</body>
</html>