<?php
require_once __DIR__ . '/src/controllers/AuthController.php';

$authController = new \App\controllers\AuthController();
$authController->login();
?>