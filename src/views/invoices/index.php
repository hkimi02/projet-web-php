<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Invoices</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
<!-- Sidebar -->
<?php include __DIR__ . '/../partials/sidebar.php'; ?>

<!-- Main Content -->
<div class="flex-1 p-8">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Manage Invoices</h1>
        <div class="flex justify-between items-center mb-6">
            <a href="invoices.php?action=create" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                <i class="fas fa-plus"></i> Create Invoice
            </a>
            <a href="export.php?type=invoices" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">
                <i class="fas fa-download"></i> Export CSV
            </a>
        </div>
        <!-- Search Input -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Search invoices..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="w-full" id="invoiceTable">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Invoice Number</th>
                    <th class="px-6 py-3 text-left">Amount</th>
                    <th class="px-6 py-3 text-left">Created By</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                <?php foreach ($invoices as $invoice): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4"><?= htmlspecialchars($invoice['id']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($invoice['invoice_number']) ?></td>
                        <td class="px-6 py-4">$<?= htmlspecialchars($invoice['amount']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($invoice['username'] ?? 'N/A') ?></td>
                        <td class="px-6 py-4">
                            <a href="invoices.php?action=edit&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-700">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="invoices.php?action=delete&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <a href="invoices.php?action=view&id=<?= $invoice['id'] ?>" class="px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-700">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript for Search -->
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#invoiceTable tbody tr');

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>