<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت فاکتورها</title>
    <link href="/accounting_app/public/assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">لیست فاکتورها</h1>
        <a href="/accounting_app/public/invoices/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">افزودن فاکتور جدید</a>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">شماره فاکتور</th>
                    <th class="py-2 px-4 border-b">نوع</th>
                    <th class="py-2 px-4 border-b">مشتری</th>
                    <th class="py-2 px-4 border-b">مبلغ کل</th>
                    <th class="py-2 px-4 border-b">مالیات</th>
                    <th class="py-2 px-4 border-b">تخفیف</th>
                    <th class="py-2 px-4 border-b">عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($invoices)): ?>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['id']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['type']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['customer_id']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['total']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['tax']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($invoice['discount']) ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="/accounting_app/public/invoices/edit/<?= $invoice['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">ویرایش</a>
                                <a href="/accounting_app/public/invoices/delete/<?= $invoice['id'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="py-2 px-4 border-b text-center">هیچ فاکتوری یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>