<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../config/Database.php'; // Ensure this path is correct and the file exists

class ProductController {
    // نمایش لیست محصولات
    public function index() {
        $products = Product::findAll();
        require_once __DIR__ . '/../views/products/index.php';
    }

    // نمایش فرم افزودن محصول
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $barcode = $_POST['barcode'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            Product::create($name, $category, $barcode, $price, $stock);
            header('Location: /accounting_app/public/products');
            exit;
        }
        require_once __DIR__ . '/../views/products/create.php';
    }

    // نمایش فرم ویرایش محصول
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $barcode = $_POST['barcode'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            Product::update($id, $name, $category, $barcode, $price, $stock);
            header('Location: /accounting_app/public/products');
            exit;
        }

        $product = Product::findById($id);
        require_once __DIR__ . '/../views/products/edit.php';
    }

    // حذف محصول
    public function delete($id) {
        Product::delete($id);
        header('Location: /accounting_app/public/products');
        exit;
    }
}

class Product {
    // Properties and other methods

    public static function findAll() {
        // Assuming you have a database connection set up
        $db = Database::getConnection();
        $stmt = $db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}