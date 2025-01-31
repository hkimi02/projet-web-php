<?php
require_once __DIR__ . '/src/controllers/InvoiceController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$invoiceController = new InvoiceController();

switch ($action) {
    case 'create':
        $invoiceController->create();
        break;
    case 'edit':
        $invoiceController->edit($id);
        break;
    case 'delete':
        $invoiceController->delete($id);
        break;
    case 'view':
        $invoiceController->view($id);
        break;
    case 'generate_pdf':

        break;
    default:
        $invoiceController->index();
        break;
}
?>