<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Company Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<!-- Navigation Bar -->
<nav class="bg-blue-600 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href="dashboard.php" class="text-2xl font-bold">Dashboard</a>
        <div>
            <a href="logout.php" class="px-4 py-2 bg-red-500 rounded-md hover:bg-red-700">Logout</a>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-gray-800">Welcome, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h1>
    <p class="mt-2 text-gray-600">Role: <?= htmlspecialchars($_SESSION['user']['role']) ?></p>

    <!-- Superadmin Features -->
    <?php if (isSuperadmin()): ?>
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-800">Superadmin Features</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="users.php" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="text-xl font-bold text-blue-600">Manage Users</h3>
                    <p class="mt-2 text-gray-600">View, create, update, and delete users.</p>
                </a>
                <a href="invoices.php" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="text-xl font-bold text-blue-600">Manage Invoices</h3>
                    <p class="mt-2 text-gray-600">View, create, update, and delete invoices.</p>
                </a>
                <a href="products.php" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="text-xl font-bold text-blue-600">Manage Products</h3>
                    <p class="mt-2 text-gray-600">View, create, update, and delete products.</p>
                </a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Employee Features -->
    <?php if (isEmployee()): ?>
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-800">Employee Features</h2>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="invoices.php" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="text-xl font-bold text-blue-600">Manage Invoices</h3>
                    <p class="mt-2 text-gray-600">View and create invoices.</p>
                </a>
                <a href="products.php" class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="text-xl font-bold text-blue-600">Manage Products</h3>
                    <p class="mt-2 text-gray-600">View and create products.</p>
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white text-center p-4 mt-10">
    <p>&copy; 2023 Company Management System. All rights reserved.</p>
</footer>
</body>
</html>