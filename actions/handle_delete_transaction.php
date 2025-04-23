<?php
require_once '../config/config.php';
require_once '../includes/functions/transactions.php';


if (!isset($_SESSION['user'])) {
    header('Location: ../views/auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaction_id'])) {
    $transactionId = $_POST['transaction_id'];

    if (deleteTransaction($transactionId, $pdo)) {
        $_SESSION['transaction_success'] = "Transaction deleted successfully.";
    } else {
        $_SESSION['transaction_errors'] = ["Failed to delete transaction. Please try again."];
    }

    header('Location: ../views/dashboard/transactions.php');
    exit();
} else {
    $_SESSION['transaction_errors'] = ["Invalid request."];
    header('Location: ../views/dashboard/transactions.php');
    exit();
}
