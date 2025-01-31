<?php

namespace App\controllers;

require_once __DIR__ . '/../includes/auth.php';

class HomeController
{
    public function index() {
        // Redirect to dashboard if the user is already logged in
        if (isLoggedIn()) {
            header('Location: dashboard.php');
            exit;
        }

        // Load the home view
        require_once __DIR__ . '/../views/home.php';
    }
}