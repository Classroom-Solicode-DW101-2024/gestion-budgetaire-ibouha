<?php
require_once '../config/config.php';
require_once '../includes/helpers/validator.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    $errors = validateLogin($email, $password);

    if (empty($errors)) {
        // Check user in DB
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login success
            $_SESSION['user'] = $user ;
            header("Location: ../views/dashboard/dashboard.php");
            exit;
        } else {
            $errors['password'] = "Invalid email or password.";
        }
    }

    $_SESSION['login_errors'] = $errors;
    $_SESSION['old_login'] = ['email' => $email];
    header("Location: ../views/auth/login.php");
    exit;
}
