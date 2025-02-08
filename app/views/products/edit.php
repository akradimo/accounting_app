<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش محصول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">ویرایش محصول</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">نام محصول</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $product['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">دسته‌بندی</label>
                <input type="text" id="category" name="category" class="form-control" value="<?= $product['category'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">بارکد</label>
                <input type="text" id="barcode" name="barcode" class="form-control" value="<?= $product['barcode'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">قیمت</label>
                <input type="number" id="price" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">موجودی</label>
                <input type="number" id="stock" name="stock" class="form-control" value="<?= $product['stock'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </form>
    </div>
</body>
</html>