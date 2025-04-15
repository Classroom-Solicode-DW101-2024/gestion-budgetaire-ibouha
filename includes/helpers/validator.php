<?php
function validate_register_input($name, $email, $password, $confirm_password) {
    $errors = [];

    if (empty($name)) {
        $errors['full_name'] = "Full Name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    

    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    return $errors;
}

function validateLogin($email, $password)
{
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    return $errors;
}