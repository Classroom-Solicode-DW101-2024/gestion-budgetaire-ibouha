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

function validate_transaction_inputs($data)
{
    $errors = [];

    if (!isset($data['type']) || !in_array($data['type'], ['revenu', 'depense'])) {
        $errors['type'] = "Type invalide. Veuillez choisir 'revenu' ou 'dépense'.";
    }

    if (!isset($data['montant']) || !is_numeric($data['montant']) || $data['montant'] <= 0) {
        $errors['montant'] = "Veuillez entrer un montant valide.";
    }

    if (!isset($data['category']) || empty($data['category'])) {
        $errors['category'] = "Veuillez choisir une catégorie.";
    }

    if (!isset($data['date_transaction']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['date_transaction'])) {
        $errors['date_transaction'] = "Veuillez entrer une date valide (AAAA-MM-JJ).";
    }

    return $errors;
}

function validate_date($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

