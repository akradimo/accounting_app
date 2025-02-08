<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">سیستم مدیریت حسابداری</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        اشخاص
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/accounting_app/public/persons/new">شخص جدید</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/persons">اشخاص</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/receivables">دریافت</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/receivables/list">لیست دریافت‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/payments">پرداخت</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/payments/list">لیست پرداخت‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/shareholders">سهامداران</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/sellers">فروشندگان</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        کالاها و خدمات
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/accounting_app/public/products/new">کالای جدید</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/services/new">خدمات جدید</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/products">کالاها و خدمات</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/products/update-prices">به‌روزرسانی لیست قیمت</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/products/print-barcode">چاپ بارکد</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/products/print-bulk-barcode">چاپ بارکد تعدادی</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/products/price-list">صفحه لیست قیمت کالا</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        بانکداری
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/accounting_app/public/banks">بانک‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/cashboxes">صندوق‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/petty-cash">تنخواه‌گردان‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/transfers">انتقال</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/transfers/list">لیست انتقال‌ها</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/checks/received">لیست چک‌های دریافتی</a></li>
                        <li class="list-group-item"><a href="/accounting_app/public/checks/paid">لیست چک‌های پرداختی</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ادامه لیست‌ها برای سایر بخش‌ها -->
    </div>
</body>
</html>
<?php


require_once __DIR__ . '/../app/core/Router.php';

$router = new Router();

require_once __DIR__ . '/routes.php';

$router->dispatch();

ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);  
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/InvoiceController.php';

$router = new Router();

// مسیرها
$router->addRoute('GET', '/accounting_app/public/products', [new ProductController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/products/create', [new ProductController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/products/create', [new ProductController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/products/edit/{id}', [new ProductController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/products/edit/{id}', [new ProductController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/products/delete/{id}', [new ProductController(), 'delete']);

$router->addRoute('GET', '/accounting_app/public/invoices', [new InvoiceController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/invoices/create', [new InvoiceController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/invoices/create', [new InvoiceController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/invoices/edit/{id}', [new InvoiceController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/invoices/edit/{id}', [new InvoiceController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/invoices/delete/{id}', [new InvoiceController(), 'delete']);
require_once __DIR__ . '/../app/controllers/ReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/sales', [new ReportController(), 'salesReport']);
$router->addRoute('POST', '/accounting_app/public/reports/sales', [new ReportController(), 'salesReport']);
$router->addRoute('GET', '/accounting_app/public/reports/purchases', [new ReportController(), 'purchaseReport']);
$router->addRoute('POST', '/accounting_app/public/reports/purchases', [new ReportController(), 'purchaseReport']);
require_once __DIR__ . '/../app/controllers/InventoryController.php';

$router->addRoute('GET', '/accounting_app/public/inventory', [new InventoryController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/inventory/update/{id}', [new InventoryController(), 'updateStock']);
$router->addRoute('POST', '/accounting_app/public/inventory/update/{id}', [new InventoryController(), 'updateStock']);
$router->addRoute('GET', '/accounting_app/public/inventory/history/{id}', [new InventoryController(), 'stockHistory']);
require_once __DIR__ . '/../app/controllers/DashboardController.php';

$router->addRoute('GET', '/accounting_app/public/dashboard', [new DashboardController(), 'index']);
require_once __DIR__ . '/../app/controllers/SettingController.php';

$router->addRoute('GET', '/accounting_app/public/settings', [new SettingController(), 'index']);
$router->addRoute('POST', '/accounting_app/public/settings/update', [new SettingController(), 'update']);
require_once __DIR__ . '/../app/controllers/BackupController.php';

$router->addRoute('GET', '/accounting_app/public/backup', [new BackupController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/backup/create', [new BackupController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/backup/restore', [new BackupController(), 'restore']);

require_once __DIR__ . '/../app/controllers/RoleController.php';

$router->addRoute('GET', '/accounting_app/public/roles', [new RoleController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/roles/create', [new RoleController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/roles/create', [new RoleController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/roles/edit/{id}', [new RoleController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/roles/edit/{id}', [new RoleController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/roles/delete/{id}', [new RoleController(), 'delete']);

require_once __DIR__ . '/../app/controllers/PrinterController.php';

$router->addRoute('GET', '/accounting_app/public/printer/print/{id}', [new PrinterController(), 'print']);

require_once __DIR__ . '/../app/controllers/ProductController.php';

$router->addRoute('GET', '/accounting_app/public/products/scan-barcode', [new ProductController(), 'scanBarcode']);

require_once __DIR__ . '/../app/controllers/NotificationController.php';

$router->addRoute('GET', '/accounting_app/public/notifications', [new NotificationController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/notifications/mark-as-read/{id}', [new NotificationController(), 'markAsRead']);
require_once __DIR__ . '/../app/controllers/NotificationController.php';
require_once __DIR__ . '/../app/controllers/PaymentController.php';

$router->addRoute('GET', '/accounting_app/public/payments', [new PaymentController(), 'index']);
require_once __DIR__ . '/../app/controllers/NotificationController.php';
require_once __DIR__ . '/../app/controllers/PaymentController.php';

$router->addRoute('GET', '/accounting_app/public/payments', [new PaymentController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/payments/create/{invoiceId}', [new PaymentController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/payments/create/{invoiceId}', [new PaymentController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/payments/process/{paymentId}', [new PaymentController(), 'processPayment']);

require_once __DIR__ . '/../app/controllers/AdvancedReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/advanced/profit-loss', [new AdvancedReportController(), 'profitLoss']);
$router->addRoute('POST', '/accounting_app/public/reports/advanced/profit-loss', [new AdvancedReportController(), 'profitLoss']);
$router->addRoute('GET', '/accounting_app/public/reports/advanced/sales-trend', [new AdvancedReportController(), 'salesTrend']);
$router->addRoute('POST', '/accounting_app/public/reports/advanced/sales-trend', [new AdvancedReportController(), 'salesTrend']);

require_once __DIR__ . '/../app/controllers/PermissionController.php';

$router->addRoute('GET', '/accounting_app/public/permissions/{roleId}', [new PermissionController(), 'index']);
$router->addRoute('POST', '/accounting_app/public/permissions/update/{permissionId}', [new PermissionController(), 'update']);
$router->addRoute('GET', '/accounting_app/public/permissions/delete/{permissionId}', [new PermissionController(), 'delete']);

require_once __DIR__ . '/../app/controllers/TopCustomersReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/advanced/top-customers', [new TopCustomersReportController(), 'topCustomers']);

require_once __DIR__ . '/../app/controllers/TopProductsReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/advanced/top-products', [new TopProductsReportController(), 'topProducts']);
require_once __DIR__ . '/../app/controllers/TaxReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/advanced/tax', [new TaxReportController(), 'tax']);
$router->addRoute('POST', '/accounting_app/public/reports/advanced/tax', [new TaxReportController(), 'tax']);

require_once __DIR__ . '/../app/controllers/ProductController.php';

$router->addRoute('GET', '/accounting_app/public/products', [new ProductController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/products/create', [new ProductController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/products/create', [new ProductController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/products/edit/{id}', [new ProductController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/products/edit/{id}', [new ProductController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/products/delete/{id}', [new ProductController(), 'delete']);

require_once __DIR__ . '/../app/controllers/PersonController.php';
require_once __DIR__ . '/../app/controllers/BankController.php';
$router->addRoute('GET', '/accounting_app/public/banks', [new BankController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/banks/create', [new BankController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/banks/create', [new BankController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/banks/edit/{id}', [new BankController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/banks/edit/{id}', [new BankController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/banks/delete/{id}', [new BankController(), 'delete']);

require_once __DIR__ . '/../app/controllers/PersonController.php';

$router->addRoute('GET', '/accounting_app/public/persons', [new PersonController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/persons/delete/{id}', [new PersonController(), 'delete']);

require_once __DIR__ . '/../app/controllers/BankController.php';

$router->addRoute('GET', '/accounting_app/public/banks', [new BankController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/banks/create', [new BankController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/banks/create', [new BankController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/banks/edit/{id}', [new BankController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/banks/edit/{id}', [new BankController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/banks/delete/{id}', [new BankController(), 'delete']);

require_once __DIR__ . '/../app/controllers/SaleController.php';

$router->addRoute('GET', '/accounting_app/public/sales', [new SaleController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/sales/create', [new SaleController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/sales/create', [new SaleController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/sales/view/{id}', [new SaleController(), 'view']);

require_once __DIR__ . '/../app/controllers/PurchaseController.php';

$router->addRoute('GET', '/accounting_app/public/purchases', [new PurchaseController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/purchases/create', [new PurchaseController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/purchases/create', [new PurchaseController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/purchases/view/{id}', [new PurchaseController(), 'view']);

require_once __DIR__ . '/../app/controllers/ExpenseController.php';

$router->addRoute('GET', '/accounting_app/public/expenses', [new ExpenseController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/expenses/create', [new ExpenseController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/expenses/create', [new ExpenseController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/expenses/edit/{id}', [new ExpenseController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/expenses/edit/{id}', [new ExpenseController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/expenses/delete/{id}', [new ExpenseController(), 'delete']);

require_once __DIR__ . '/../app/controllers/IncomeController.php';

$router->addRoute('GET', '/accounting_app/public/incomes', [new IncomeController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/incomes/create', [new IncomeController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/incomes/create', [new IncomeController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/incomes/edit/{id}', [new IncomeController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/incomes/edit/{id}', [new IncomeController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/incomes/delete/{id}', [new IncomeController(), 'delete']);

require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/SettingController.php';

$router->addRoute('GET', '/accounting_app/public/users', [new UserController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/users/create', [new UserController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/users/create', [new UserController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/users/delete/{id}', [new UserController(), 'delete']);

$router->addRoute('GET', '/accounting_app/public/settings', [new SettingController(), 'index']);
$router->addRoute('POST', '/accounting_app/public/settings/update', [new SettingController(), 'update']);

require_once __DIR__ . '/../app/controllers/ReportController.php';

$router->addRoute('GET', '/accounting_app/public/reports/sales', [new ReportController(), 'sales']);
$router->addRoute('POST', '/accounting_app/public/reports/sales', [new ReportController(), 'sales']);
$router->addRoute('GET', '/accounting_app/public/reports/expenses', [new ReportController(), 'expenses']);
$router->addRoute('POST', '/accounting_app/public/reports/expenses', [new ReportController(), 'expenses']);
$router->addRoute('GET', '/accounting_app/public/reports/incomes', [new ReportController(), 'incomes']);
$router->addRoute('POST', '/accounting_app/public/reports/incomes', [new ReportController(), 'incomes']);

require_once __DIR__ . '/../app/controllers/PersonController.php';

$router->addRoute('GET', '/accounting_app/public/persons', [new PersonController(), 'index']);
$router->addRoute('GET', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('POST', '/accounting_app/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('GET', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('POST', '/accounting_app/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('GET', '/accounting_app/public/persons/delete/{id}', [new PersonController(), 'delete']);



require_once __DIR__ . '/../app/controllers/PersonController.php';

$router->addRoute('GET', '/project/public/persons', [new PersonController(), 'index']);
$router->addRoute('GET', '/project/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('POST', '/project/public/persons/create', [new PersonController(), 'create']);
$router->addRoute('GET', '/project/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('POST', '/project/public/persons/edit/{id}', [new PersonController(), 'edit']);
$router->addRoute('GET', '/project/public/persons/delete/{id}', [new PersonController(), 'delete']);










$router->dispatch();




// بقیه کدتون