<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Invoices</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Manage Invoices</h1>
    <a href="invoices.php?action=create" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Create Invoice</a>
    <table class="w-full mt-6 bg-white rounded-lg shadow-md">
        <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Invoice Number</th>
            <th class="px-4 py-2">Amount</th>
            <th class="px-4 py-2">Created By</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td class="px-4 py-2"><?= htmlspecialchars($invoice['id']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($invoice['invoice_number']) ?></td>
                <td class="px-4 py-2">$<?= htmlspecialchars($invoice['amount']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($invoice['username'] ?? 'N/A') ?></td>
                <td class="px-4 py-2">
                    <a href="invoices.php?action=edit&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-700">Edit</a>
                    <a href="invoices.php?action=delete&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">Delete</a>
                    <a href="invoices.php?action=view&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-700">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>