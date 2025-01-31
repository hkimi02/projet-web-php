<!-- Sidebar -->
<div class="bg-blue-600 text-white w-64 min-h-screen p-4">
    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
    <ul>
        <li class="mb-4">
            <a href="dashboard.php" class="block px-4 py-2 hover:bg-blue-700 rounded-md">Home</a>
        </li>
        <?php if (isSuperadmin()): ?>
        <li class="mb-4">
            <a href="users.php" class="block px-4 py-2 hover:bg-blue-700 rounded-md">Manage Users</a>
        </li>
        <?php endif; ?>
        <li class="mb-4">
            <a href="invoices.php" class="block px-4 py-2 hover:bg-blue-700 rounded-md">Manage Invoices</a>
        </li>
        <li class="mb-4">
            <a href="products.php" class="block px-4 py-2 hover:bg-blue-700 rounded-md">Manage Products</a>
        </li>
        <li class="mb-4">
            <a href="logout.php" class="block px-4 py-2 bg-red-500 hover:bg-red-700 rounded-md">Logout</a>
        </li>
    </ul>
</div>