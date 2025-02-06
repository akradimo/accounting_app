<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تنظیمات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">تنظیمات</h1>
        <form method="POST" action="/accounting_app/public/settings/update">
            <div class="mb-3">
                <label for="tax_rate" class="form-label">نرخ مالیات (%)</label>
                <input type="number" id="tax_rate" name="tax_rate" class="form-control" value="<?= Setting::get('tax_rate') ?>" required>
            </div>
            <div class="mb-3">
                <label for="currency" class="form-label">واحد پول</label>
                <input type="text" id="currency" name="currency" class="form-control" value="<?= Setting::get('currency') ?>" required>
            </div>
            <div class="mb-3">
                <label for="low_stock_threshold" class="form-label">حداقل موجودی انبار</label>
                <input type="number" id="low_stock_threshold" name="low_stock_threshold" class="form-control" value="<?= Setting::get('low_stock_threshold') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تنظیمات</button>
        </form>
    </div>
</body>
</html>