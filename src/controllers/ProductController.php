<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../../includes/auth.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    // List all products
    public function index() {
        $products = $this->productModel->findAll();
        require_once __DIR__ . '/../views/products/index.php';
    }

    // Create a new product
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $this->productModel->create($name, $price, $description);
            header('Location: products.php');
            exit;
        } else {
            require_once __DIR__ . '/../views/products/create.php';
        }
    }

    // Edit a product
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $this->productModel->update($id, $name, $price, $description);
            header('Location: products.php');
            exit;
        } else {
            $product = $this->productModel->findById($id);
            require_once __DIR__ . '/../views/products/edit.php';
        }
    }

    // Delete a product
    public function delete($id) {
        $this->productModel->delete($id);
        header('Location: products.php');
        exit;
    }
}
?>