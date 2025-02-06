<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پشتیبان‌گیری و بازیابی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">پشتیبان‌گیری و بازیابی</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">پشتیبان‌گیری</div>
                    <div class="card-body">
                        <p>برای ایجاد پشتیبان از پایگاه داده، روی دکمه زیر کلیک کنید.</p>
                        <a href="/accounting_app/public/backup/create" class="btn btn-primary">ایجاد پشتیبان</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">بازیابی</div>
                    <div class="card-body">
                        <p>برای بازیابی پایگاه داده از یک فایل پشتیبان، فایل خود را آپلود کنید.</p>
                        <form method="POST" action="/accounting_app/public/backup/restore" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="file" name="backup_file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-warning">بازیابی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>