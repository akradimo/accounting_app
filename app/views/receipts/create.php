<h1 class="mb-4">دریافت جدید</h1>
<form method="POST" action="/accounting_app/public/receipts/create">
    <div class="mb-3">
        <label for="person_id" class="form-label">شخص</label>
        <select id="person_id" name="person_id" class="form-control" required>
            <?php foreach ($persons as $person): ?>
                <option value="<?= $person['id'] ?>"><?= htmlspecialchars($person['display_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">مبلغ</label>
        <input type="number" id="amount" name="amount" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">تاریخ</label>
        <input type="date" id="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">توضیحات</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">ذخیره</button>
</form>