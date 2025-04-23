<?php
require_once '../config/config.php';
require_once '../includes/helpers/validator.php';
require_once '../includes/functions/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = validate_register_input($name, $email, $password, $confirm_password);

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $errors['email'] = "Email is already registered.";
        } else {
            $user = ['full_name' => $name, 'email' => $email, 'password' => $password];
            addUser($user, $pdo);
            header("Location: ../views/auth/login.php?register=success");
            exit;
        }
    }

    $_SESSION['register_errors'] = $errors;
    $_SESSION['old_data'] = ['full_name' => $name, 'email' => $email];

    header("Location: ../views/auth/register.php");
    exit;
}
