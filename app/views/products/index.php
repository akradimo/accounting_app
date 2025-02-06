<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کالاها</title>
    <link href="/accounting_app/public/assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">لیست کالاها</h1>
        <a href="/accounting_app/public/products/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">افزودن کالای جدید</a>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">نام</th>
                    <th class="py-2 px-4 border-b">دسته‌بندی</th>
                    <th class="py-2 px-4 border-b">بارکد</th>
                    <th class="py-2 px-4 border-b">قیمت</th>
                    <th class="py-2 px-4 border-b">موجودی</th>
                    <th class="py-2 px-4 border-b">عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($product['name']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($product['category']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($product['barcode']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($product['price']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($product['stock']) ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="/accounting_app/public/products/edit/<?= $product['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">ویرایش</a>
                                <a href="/accounting_app/public/products/delete/<?= $product['id'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 border-b text-center">هیچ کالایی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>