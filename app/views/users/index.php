<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست کاربران</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">لیست کاربران</h1>
        <a href="/accounting_app/public/users/create" class="btn btn-primary mb-3">افزودن کاربر</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام کاربری</th>
                    <th>نقش</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <a href="/accounting_app/public/users/delete/<?= $user['id'] ?>" class="btn btn-danger">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>