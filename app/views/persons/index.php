<?php require_once __DIR__ . '/../layouts/main.php'; ?>

<h1 class="mb-4">لیست اشخاص</h1>
<a href="/project/public/persons/create" class="btn btn-primary mb-3">شخص جدید</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>نام شرکت</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>نام مستعار</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($persons as $person): ?>
            <tr>
                <td><?= htmlspecialchars($person['company']) ?></td>
                <td><?= htmlspecialchars($person['first_name']) ?></td>
                <td><?= htmlspecialchars($person['last_name']) ?></td>
                <td><?= htmlspecialchars($person['display_name']) ?></td>
                <td>
                    <a href="/project/public/persons/edit/<?= $person['id'] ?>" class="btn btn-warning">ویرایش</a>
                    <a href="/project/public/persons/delete/<?= $person['id'] ?>" class="btn btn-danger">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>