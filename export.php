<?php
global $pdo;
require_once __DIR__ . '/includes/db.php';

$type = $_GET['type'] ?? '';

if (empty($type)) {
    die("Invalid export type.");
}

// Fetch data based on type
switch ($type) {
    case 'users':
        $stmt = $pdo->query("SELECT * FROM users");
        $filename = 'users_export.csv';
        break;
    case 'invoices':
        $stmt = $pdo->query("SELECT invoices.*, users.username FROM invoices JOIN users ON invoices.user_id = users.id");
        $filename = 'invoices_export.csv';
        break;
    case 'products':
        $stmt = $pdo->query("SELECT * FROM products");
        $filename = 'products_export.csv';
        break;
    default:
        die("Invalid export type.");
}

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($data)) {
    die("No data to export.");
}

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Open output stream
$output = fopen('php://output', 'w');

// Add CSV headers
fputcsv($output, array_keys($data[0]));

// Add data rows
foreach ($data as $row) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>