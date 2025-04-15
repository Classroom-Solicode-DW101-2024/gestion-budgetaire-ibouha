<?php
require_once '../config/config.php';
require_once '../includes/helpers/validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = validate_register_input($name, $email, $password, $confirm_password);
    

    if (empty($errors)) {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $errors['email'] = "Email is already registered.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);

            header("Location: ../views/auth/login.php?register=success");
            exit;
        }
    }

    // Store errors in session to show them on the form
    session_start();
    $_SESSION['register_errors'] = $errors;
    $_SESSION['old_data'] = ['full_name' => $name, 'email' => $email];

    header("Location: ../views/auth/register.php");
    exit;
}
