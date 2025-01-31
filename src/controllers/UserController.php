<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../../includes/mailer.php';
require_once __DIR__ . '/../../includes/auth.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // List all users
    public function index() {
        $users = $this->userModel->findAll();
        require_once __DIR__ . '/../views/users/index.php';
    }

    // Create a new user
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $email = $_POST['email'];
            $role = $_POST['role'];

            $this->userModel->create($username, $password, $email, $role);
            header('Location: users.php');
            exit;
        } else {
            require_once __DIR__ . '/../views/users/create.php';
        }
    }

    // Edit a user
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $this->userModel->update($id, $username, $email, $role, $status);
            header('Location: users.php');
            exit;
        } else {
            $user = $this->userModel->findById($id);
            require_once __DIR__ . '/../views/users/edit.php';
        }
    }

    // Delete a user
    public function delete($id) {
        $this->userModel->delete($id);
        header('Location: users.php');
        exit;
    }

    // Approve or reject an employee
    public function updateStatus($id, $status) {
        $this->userModel->updateStatus($id, $status);

        // Send email notification
        $user = $this->userModel->findById($id);
        $subject = "Your Account Status";
        $message = "Your account has been $status.";

        sendEmail($user['email'], $subject, $message);

        header('Location: users.php');
        exit;
    }
}
?>