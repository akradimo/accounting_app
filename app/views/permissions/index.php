<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت دسترسی‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">مدیریت دسترسی‌ها برای نقش: <?= htmlspecialchars($role['name']) ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ماژول</th>
                    <th>دسترسی</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($permissions)): ?>
                    <?php foreach ($permissions as $permission): ?>
                        <tr>
                            <td><?= htmlspecialchars($permission['module']) ?></td>
                            <td><?= htmlspecialchars($permission['access']) ?></td>
                            <td>
                                <a href="/accounting_app/public/permissions/update/<?= $permission['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                                <a href="/accounting_app/public/permissions/delete/<?= $permission['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">هیچ دسترسی‌ای یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>