<?php

namespace App\models;
require_once __DIR__ . '/../includes/db.php';

class UserModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    // Fetch all users
    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    // Find a user by ID
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Create a new user
    public function create($username, $password, $email, $role = 'employee', $status = 'pending') {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, email, role, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $password, $email, $role, $status]);
    }

    // Update a user
    public function update($id, $username, $email, $role, $status) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ?, role = ?, status = ? WHERE id = ?");
        $stmt->execute([$username, $email, $role, $status, $id]);
    }

    // Delete a user
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Update user status (approve/reject)
    public function updateStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE users SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }
}