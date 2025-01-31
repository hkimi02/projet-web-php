<?php
require_once __DIR__ . '/src/controllers/UserController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$userController = new UserController();

switch ($action) {
    case 'create':
        $userController->create();
        break;
    case 'edit':
        $userController->edit($id);
        break;
    case 'delete':
        $userController->delete($id);
        break;
    case 'approve':
        $userController->updateStatus($id, 'approved');
        break;
    case 'reject':
        $userController->updateStatus($id, 'rejected');
        break;
    default:
        $userController->index();
        break;
}
