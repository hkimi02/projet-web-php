<?php

namespace App\controllers;

class DashboardController
{
    public function index() {
        // Redirect to login if not logged in
        if (!isLoggedIn()) {
            header('Location: login.php');
            exit;
        }

        // Load the dashboard view
        require_once __DIR__ . '/../views/dashboard.php';
    }
}