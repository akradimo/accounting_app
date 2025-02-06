<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت موجودی انبار</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">کالاهای با موجودی کم</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام کالا</th>
                    <th>موجودی</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lowStockProducts)): ?>
                    <?php foreach ($lowStockProducts as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['stock']) ?></td>
                            <td>
                                <a href="/accounting_app/public/inventory/update/<?= $product['id'] ?>" class="btn btn-warning btn-sm">به‌روزرسانی موجودی</a>
                                <a href="/accounting_app/public/inventory/history/<?= $product['id'] ?>" class="btn btn-info btn-sm">تاریخچه موجودی</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">هیچ کالایی با موجودی کم یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>