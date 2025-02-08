<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>گزارش مشتریان برتر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">گزارش مشتریان برتر</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام مشتری</th>
                    <th>مجموع خریدها</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report as $row): ?>
                    <tr>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= number_format($row['total_purchases'], 2) ?> تومان</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>