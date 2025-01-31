<?php
session_start();

// Function to log in a user
function login($username, $password, $pdo) {
    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

// Function to check if a user is logged in
function isLoggedIn() {
    return isset($_SESSION['user']);
}

// Function to log out a user
function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Function to check if the logged-in user is a superadmin
function isSuperadmin() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'superadmin';
}

// Function to check if the logged-in user is an employee
function isEmployee() {
    return isLoggedIn() && $_SESSION['user']['role'] === 'employee';
}
?>