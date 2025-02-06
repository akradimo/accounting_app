<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController {
    public function index() {
        $products = Product::findAll();
        require_once __DIR__ . '/../views/products/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $barcode = $_POST['barcode'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            Product::create($name, $category, $barcode, $price, $stock);
            header('Location: /accounting_app/public/products');
            exit();
        }

        require_once __DIR__ . '/../views/products/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $barcode = $_POST['barcode'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            Product::update($id, $name, $category, $barcode, $price, $stock);
            header('Location: /accounting_app/public/products');
            exit();
        }

        $product = Product::findById($id);
        require_once __DIR__ . '/../views/products/edit.php';
    }

    public function delete($id) {
        Product::delete($id);
        header('Location: /accounting_app/public/products');
        exit();
    }
}