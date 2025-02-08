<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش مالیاتی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">گزارش مالیاتی</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>فروش کل</th>
                    <th>مالیات فروش</th>
                    <th>خرید کل</th>
                    <th>مالیات خرید</th>
                    <th>مالیات خالص</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= number_format($report['total_sales'], 2) ?> تومان</td>
                    <td><?= number_format($report['sales_tax'], 2) ?> تومان</td>
                    <td><?= number_format($report['total_purchases'], 2) ?> تومان</td>
                    <td><?= number_format($report['purchase_tax'], 2) ?> تومان</td>
                    <td><?= number_format($report['net_tax'], 2) ?> تومان</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>