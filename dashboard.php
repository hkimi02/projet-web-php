<?php
require __DIR__ . "/src/controllers/DashboardController.php";
$dashboardController = new DashboardController();
$dashboardController->index();
?>
