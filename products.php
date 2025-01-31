<?php
require_once __DIR__ . '/src/controllers/ProductController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$productController = new ProductController();

switch ($action) {
    case 'create':
        $productController->create();
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'delete':
        $productController->delete($id);
        break;
    default:
        $productController->index();
        break;
}
?>