<?php


require_once __DIR__ . '/../../includes/db.php';

class InvoiceModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Fetch all invoices (for superadmin)
    public function findAll() {
        $stmt = $this->pdo->query("SELECT invoices.*, users.username FROM invoices JOIN users ON invoices.user_id = users.id");
        return $stmt->fetchAll();
    }

    // Fetch invoices for a specific user (for employees)
    public function findByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM invoices JOIN users ON invoices.user_id = users.id WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    // Find an invoice by ID
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM invoices WHERE id = ?");
        $stmt->execute([$id]);
        $invoice=$stmt->fetch();
        $stmt=$this->pdo->prepare("SELECT username FROM users WHERE id=?");
        $stmt->execute([$invoice['user_id']]);
        $invoice['username']=$stmt->fetch()['username'];
        return $invoice;
    }

    // Create a new invoice
    public function create($userId, $invoiceNumber, $amount) {
        $stmt = $this->pdo->prepare("INSERT INTO invoices (user_id, invoice_number, amount) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $invoiceNumber, $amount]);
    }

    // Update an invoice
    public function update($id, $invoiceNumber, $amount) {
        $stmt = $this->pdo->prepare("UPDATE invoices SET invoice_number = ?, amount = ? WHERE id = ?");
        $stmt->execute([$invoiceNumber, $amount, $id]);
    }

    // Delete an invoice
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM invoices WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>