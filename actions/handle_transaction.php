<?php
require_once '../config/config.php';
require_once '../includes/functions/transactions.php';
require_once '../includes/helpers/validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'type' => $_POST['type'] ?? '',
        'montant' => $_POST['montant'] ?? '',
        'category' => $_POST['category'] ?? '',
        'description' => $_POST['description'] ?? '',
        'date_transaction' => $_POST['date_transaction'] ?? '',
    ];

    $errors = validate_transaction_inputs($data);

    if (!empty($errors)) {
        $_SESSION['transaction_errors'] = $errors;
        header('Location: ../views/dashboard/transactions.php');
        exit;
    }

    $transaction = [
        'user_id' => $_SESSION['user']['id'],
        'type' => $data['type'],
        'montant' => $data['montant'],
        'category_id' => $data['category'],
        'description' => $data['description'],
        'date_transaction' => $data['date_transaction']
    ];

    if (addTransaction($transaction, $pdo)) {
        $_SESSION['transaction_success'] = "Transaction ajoutée avec succès.";
        header('Location: ../views/dashboard/transactions.php');
        exit;
    } else {
        $_SESSION['transaction_errors'] = ['general' => 'Erreur lors de l’ajout de la transaction.'];
        header('Location: ../views/dashboard/transactions.php');
        exit;
    }
}
