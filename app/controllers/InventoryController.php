<?php

require_once __DIR__ . '/../models/Inventory.php';
require_once __DIR__ . '/../models/Product.php';

class InventoryController {
    public function index() {
        $lowStockProducts = Inventory::getLowStockProducts();
        require_once __DIR__ . '/../views/inventory/index.php';
    }

    public function updateStock($productId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quantity = $_POST['quantity'];

            Inventory::updateStock($productId, $quantity);
            header('Location: /accounting_app/public/inventory');
            exit();
        }

        $product = Product::findById($productId);
        require_once __DIR__ . '/../views/inventory/update_stock.php';
    }

    public function stockHistory($productId) {
        $history = Inventory::getStockHistory($productId);
        require_once __DIR__ . '/../views/inventory/stock_history.php';
    }
}