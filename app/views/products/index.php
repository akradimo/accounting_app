<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست محصولات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">لیست محصولات</h1>
        <a href="/accounting_app/public/products/create" class="btn btn-primary mb-3">افزودن محصول</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>دسته‌بندی</th>
                    <th>بارکد</th>
                    <th>قیمت</th>
                    <th>موجودی</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['barcode'] ?></td>
                        <td><?= number_format($product['price'], 2) ?> تومان</td>
                        <td><?= $product['stock'] ?></td>
                        <td>
                            <a href="/accounting_app/public/products/edit/<?= $product['id'] ?>" class="btn btn-warning">ویرایش</a>
                            <a href="/accounting_app/public/products/delete/<?= $product['id'] ?>" class="btn btn-danger">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>