<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش موجودی کالا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">گزارش موجودی کالا</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>تعداد خریداری شده</th>
                    <th>تعداد فروخته شده</th>
                    <th>موجودی فعلی</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report as $row): ?>
                    <tr>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['total_purchased'] ?></td>
                        <td><?= $row['total_sold'] ?></td>
                        <td><?= $row['current_stock'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>