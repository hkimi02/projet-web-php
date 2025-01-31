<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <a href="invoices.php" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Back to Invoices</a>
    <h1 class="text-2xl font-bold mb-6">Create Invoice</h1>
    <form method="POST">
        <div class="mb-4">
            <label for="invoice_number" class="block text-sm font-medium text-gray-700">Invoice Number</label>
            <input type="text" name="invoice_number" id="invoice_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Create</button>
    </form>
</div>
</body>
</html>