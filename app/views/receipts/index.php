<h1 class="mb-4">لیست دریافت‌ها</h1>
<a href="/accounting_app/public/receipts/create" class="btn btn-primary mb-3">دریافت جدید</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>شخص</th>
            <th>مبلغ</th>
            <th>تاریخ</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($receipts as $receipt): ?>
            <tr>
                <td><?= htmlspecialchars($receipt['person_id']) ?></td>
                <td><?= htmlspecialchars($receipt['amount']) ?></td>
                <td><?= htmlspecialchars($receipt['date']) ?></td>
                <td><?= htmlspecialchars($receipt['description']) ?></td>
                <td>
                    <a href="/accounting_app/public/receipts/edit/<?= $receipt['id'] ?>" class="btn btn-warning">ویرایش</a>
                    <a href="/accounting_app/public/receipts/delete/<?= $receipt['id'] ?>" class="btn btn-danger">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>