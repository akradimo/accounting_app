<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش فروش</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">گزارش فروش</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>شماره فاکتور</th>
                    <th>مشتری</th>
                    <th>مبلغ کل</th>
                    <th>مالیات</th>
                    <th>تخفیف</th>
                    <th>تاریخ</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $sale): ?>
                        <tr>
                            <td><?= htmlspecialchars($sale['id']) ?></td>
                            <td><?= htmlspecialchars($sale['customer_id']) ?></td>
                            <td><?= htmlspecialchars($sale['total']) ?></td>
                            <td><?= htmlspecialchars($sale['tax']) ?></td>
                            <td><?= htmlspecialchars($sale['discount']) ?></td>
                            <td><?= htmlspecialchars($sale['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">هیچ فروشی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>