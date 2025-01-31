<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Invoice Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>Invoice Number:</strong> <?= htmlspecialchars($invoice['invoice_number']) ?></p>
        <p><strong>Amount:</strong> $<?= htmlspecialchars($invoice['amount']) ?></p>
        <p><strong>Created By:</strong> <?= htmlspecialchars($invoice['username'] ?? 'N/A') ?></p>
    </div>
    <div class="mt-6">
        <a href="invoices.php?action=generate_pdf&id=<?= $invoice['id'] ?>" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">Generate PDF</a>
    </div>
</div>
</body>
</html>