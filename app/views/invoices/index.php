<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت فاکتورها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">لیست فاکتورها</h1>
        <a href="/accounting_app/public/invoices/create" class="btn btn-primary mb-4">افزودن فاکتور جدید</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>شماره فاکتور</th>
                    <th>نوع</th>
                    <th>مشتری</th>
                    <th>مبلغ کل</th>
                    <th>مالیات</th>
                    <th>تخفیف</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($invoices)): ?>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td><?= htmlspecialchars($invoice['id']) ?></td>
                            <td><?= htmlspecialchars($invoice['type']) ?></td>
                            <td><?= htmlspecialchars($invoice['customer_id']) ?></td>
                            <td><?= htmlspecialchars($invoice['total']) ?></td>
                            <td><?= htmlspecialchars($invoice['tax']) ?></td>
                            <td><?= htmlspecialchars($invoice['discount']) ?></td>
                            <td>
                                <a href="/accounting_app/public/invoices/edit/<?= $invoice['id'] ?>" class="btn btn-warning btn-sm">ویرایش</a>
                                <a href="/accounting_app/public/invoices/delete/<?= $invoice['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">هیچ فاکتوری یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>