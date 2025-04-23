<?php
require_once '../config/config.php';
require_once '../includes/helpers/validator.php';
require_once '../includes/functions/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $errors = validateLogin($email, $password);

    if (empty($errors)) {
        $user = login($email, $password, $pdo);

        if ($user) {
            $_SESSION['user'] = $user;

            $_SESSION['show_welcome_popup'] = true;



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
