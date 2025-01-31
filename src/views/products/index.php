<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
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
        <h1 class="text-2xl font-bold mb-6">Manage Products</h1>
        <div class="flex justify-between items-center mb-6">
            <a href="products.php?action=create" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                <i class="fas fa-plus"></i> Create Product
            </a>
            <a href="export.php?type=products" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">
                <i class="fas fa-download"></i> Export CSV
            </a>
        </div>
        <!-- Search Input -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Search products..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="w-full" id="productTable">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                <?php foreach ($products as $product): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4"><?= htmlspecialchars($product['id']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['name']) ?></td>
                        <td class="px-6 py-4">$<?= htmlspecialchars($product['price']) ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($product['description']) ?></td>
                        <td class="px-6 py-4">
                            <a href="products.php?action=edit&id=<?= $product['id'] ?>" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-700">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="products.php?action=delete&id=<?= $product['id'] ?>" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">
                                <i class="fas fa-trash"></i> Delete
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
        const rows = document.querySelectorAll('#productTable tbody tr');

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