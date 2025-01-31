<?php
require_once __DIR__ . '/../models/InvoiceModel.php';
require_once __DIR__ . '/../includes/auth.php';

class InvoiceController {
    private $invoiceModel;

    public function __construct() {
        $this->invoiceModel = new InvoiceModel();
    }

    // List all invoices (for superadmin) or user-specific invoices (for employees)
    public function index() {
        if (isSuperadmin()) {
            $invoices = $this->invoiceModel->findAll();
        } else {
            $invoices = $this->invoiceModel->findByUserId($_SESSION['user']['id']);
        }
        require_once __DIR__ . '/../views/invoices/index.php';
    }

    // Create a new invoice
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $invoiceNumber = $_POST['invoice_number'];
            $amount = $_POST['amount'];
            $userId = $_SESSION['user']['id'];

            $this->invoiceModel->create($userId, $invoiceNumber, $amount);
            header('Location: invoices.php');
            exit;
        } else {
            require_once __DIR__ . '/../views/invoices/create.php';
        }
    }

    // Edit an invoice
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $invoiceNumber = $_POST['invoice_number'];
            $amount = $_POST['amount'];

            $this->invoiceModel->update($id, $invoiceNumber, $amount);
            header('Location: invoices.php');
            exit;
        } else {
            $invoice = $this->invoiceModel->findById($id);
            require_once __DIR__ . '/../views/invoices/edit.php';
        }
    }

    // Delete an invoice
    public function delete($id) {
        $this->invoiceModel->delete($id);
        header('Location: invoices.php');
        exit;
    }

    // View an invoice and generate PDF
    public function view($id) {
        $invoice = $this->invoiceModel->findById($id);
        require_once __DIR__ . '/../views/invoices/view.php';
    }
}
?>