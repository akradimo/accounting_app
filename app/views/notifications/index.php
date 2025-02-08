<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نوتیفیکیشن‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">نوتیفیکیشن‌ها</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>پیام</th>
                    <th>تاریخ</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($notifications)): ?>
                    <?php foreach ($notifications as $notification): ?>
                        <tr>
                            <td><?= htmlspecialchars($notification['message']) ?></td>
                            <td><?= htmlspecialchars($notification['created_at']) ?></td>
                            <td><?= $notification['is_read'] ? 'خوانده شده' : 'خوانده نشده' ?></td>
                            <td>
                                <?php if (!$notification['is_read']): ?>
                                    <a href="/accounting_app/public/notifications/mark-as-read/<?= $notification['id'] ?>" class="btn btn-success btn-sm">علامت‌گذاری به عنوان خوانده شده</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">هیچ نوتیفیکیشنی یافت نشد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>