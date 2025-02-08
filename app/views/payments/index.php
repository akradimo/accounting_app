<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پرداخت‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">پرداخت‌ها</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>شماره فاکتور</th>
                    <th>مبلغ</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($payments)): ?>
                    <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><?= htmlspecialchars($payment['invoice_id']) ?></td>
                            <td><?= htmlspecialchars($payment['amount']) ?> تومان</td>
                            <td><?= htmlspecialchars($payment['status']) ?></td>
                            <td>
                                <a href="/accounting_app/public/payments/process/<?= $payment['id'] ?>" class="btn btn-primary btn-sm">پرداخت</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">هیچ پرداختی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>