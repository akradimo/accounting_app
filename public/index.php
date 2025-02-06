<?php

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

$router->dispatch();