<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست عمودی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f8f9fa;
            padding: 20px;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul class="nav flex-column">
            <!-- کالاها و خدمات -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#goodsAndServices" role="button" aria-expanded="false" aria-controls="goodsAndServices">
                    کالاها و خدمات
                </a>
                <div class="collapse" id="goodsAndServices">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">کالای جدید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">خدمات جدید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">کالاها و خدمات</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">به‌روزرسانی لیست قیمت</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">چاپ بارکد</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">چاپ بارکد تعدادی</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">صفحه لیست قیمت کالا</a></li>
                    </ul>
                </div>
            </li>

            <!-- بانکداری -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#banking" role="button" aria-expanded="false" aria-controls="banking">
                    بانکداری
                </a>
                <div class="collapse" id="banking">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">بانک‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">صندوق‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">تنخواه‌گردان‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">انتقال</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست انتقال‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست چک‌های دریافتی</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست چک‌های پرداختی</a></li>
                    </ul>
                </div>
            </li>

            <!-- فروش و درآمد -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#salesAndIncome" role="button" aria-expanded="false" aria-controls="salesAndIncome">
                    فروش و درآمد
                </a>
                <div class="collapse" id="salesAndIncome">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">فروش جدید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">فاکتور سریع</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">برگشت از فروش</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">فاکتورهای فروش</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">فاکتورهای برگشت از فروش</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">درآمد</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست درآمدها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">قرارداد فروش اقساطی</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست فروش اقساطی</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">اقلام تخفیف‌دار</a></li>
                    </ul>
                </div>
            </li>

            <!-- خرید و هزینه -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#purchasesAndExpenses" role="button" aria-expanded="false" aria-controls="purchasesAndExpenses">
                    خرید و هزینه
                </a>
                <div class="collapse" id="purchasesAndExpenses">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">خرید جدید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">برگشت از خرید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">فاکتورهای خرید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">فاکتورهای برگشت از خرید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">هزینه</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست هزینه‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">ضایعات</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست ضایعات</a></li>
                    </ul>
                </div>
            </li>

            <!-- حسابداری -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#accounting" role="button" aria-expanded="false" aria-controls="accounting">
                    حسابداری
                </a>
                <div class="collapse" id="accounting">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">سند جدید</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست اسناد</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">تراز افتتاحیه</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">بستن سال مالی</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">جدول حساب‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">تجمیع اسناد</a></li>
                    </ul>
                </div>
            </li>

            <!-- سایر -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#others" role="button" aria-expanded="false" aria-controls="others">
                    سایر
                </a>
                <div class="collapse" id="others">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link" href="#">آرشیو</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">پنل پیامک</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">استعلام</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">دریافت سایر</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">لیست دریافت‌ها</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">پرداخت سایر</a></li>
                        <li class="nav-item"><a class="nav-link"