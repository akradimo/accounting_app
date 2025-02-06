<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت اشخاص</title>
</head>
<body>
    <h1>لیست اشخاص</h1>
    <a href="/persons/create">افزودن شخص جدید</a>
    <table border="1">
        <thead>
            <tr>
                <th>نام</th>
                <th>نوع</th>
                <th>تلفن</th>
                <th>ایمیل</th>
                <th>آدرس</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persons as $person): ?>
                <tr>
                    <td><?= htmlspecialchars($person['name']) ?></td>
                    <td><?= htmlspecialchars($person['type']) ?></td>
                    <td><?= htmlspecialchars($person['phone']) ?></td>
                    <td><?= htmlspecialchars($person['email']) ?></td>
                    <td><?= htmlspecialchars($person['address']) ?></td>
                    <td>
                        <a href="/persons/edit/<?= $person['id'] ?>">ویرایش</a>
                        <a href="/persons/delete/<?= $person['id'] ?>" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>