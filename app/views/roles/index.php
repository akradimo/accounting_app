<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت نقش‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">لیست نقش‌ها</h1>
        <a href="/accounting_app/public/roles/create" class="btn btn-primary mb-4">افزودن نقش جدید</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>دسترسی‌ها</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($roles)): ?>
                    <?php foreach ($roles as $role): ?>
                        <tr>
                            <td><?= htmlspecialchars($role['name']) ?></td>
                            <td><?= htmlspecialchars($role['permissions']) ?></td>
                            <td>
                                <a href="/accounting_app/public/roles/edit/<?= $role['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                                <a href="/accounting_app/public/roles/delete/<?= $role['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">هیچ نقشی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>