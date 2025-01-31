<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Manage Users</h1>
    <a href="users.php?action=create" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Create User</a>
    <table class="w-full mt-6 bg-white rounded-lg shadow-md">
        <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td class="px-4 py-2"><?= htmlspecialchars($user['id']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($user['username']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($user['role']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($user['status']) ?></td>
                <td class="px-4 py-2">
                    <a href="users.php?action=edit&id=<?= $user['id'] ?>" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-700">Edit</a>
                    <a href="users.php?action=delete&id=<?= $user['id'] ?>" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-700">Delete</a>
                    <?php if ($user['status'] === 'pending'): ?>
                        <a href="users.php?action=approve&id=<?= $user['id'] ?>" class="px-2 py-1 bg-green-500 text-white rounded-md hover:bg-green-700">Approve</a>
                        <a href="users.php?action=reject&id=<?= $user['id'] ?>" class="px-2 py-1 bg-gray-500 text-white rounded-md hover:bg-gray-700">Reject</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>