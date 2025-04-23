<?php
require_once '../config/config.php';
require_once '../includes/functions/transactions.php';
require_once '../includes/helpers/validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $title = trim($_POST['title'] ?? '');
    $amount = $_POST['amount'] ?? '';
    $type = $_POST['type'] ?? '';
    $category = $_POST['category'] ?? '';
    $date = $_POST['date'] ?? '';

    $data = [
        'type' => $_POST['type'] ?? '',
        'montant' => $_POST['montant'] ?? '',
        'category' => $_POST['category'] ?? '',
        'description' => $_POST['description'] ?? '',
        'date_transaction' => $_POST['date_transaction'] ?? '',
    ];

    // Validate the fields
    $errors = validate_transaction_inputs($data);
   

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../views/dashboard/transactions.php?edit_id=$id");
        exit;
    }

    // Update the transaction
    $stmt = $conn->prepare("UPDATE transactions SET title = ?, amount = ?, type = ?, category = ?, date = ? WHERE id = ?");
    $stmt->bind_param("sdsssi", $title, $amount, $type, $category, $date, $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Transaction updated successfully.";
    } else {
        $_SESSION['errors'] = ["Failed to update transaction."];
    }

    $stmt->close();
    $conn->close();

    header("Location: ../views/dashboard/transactions.php");
    exit;
} else {
    header("Location: ../views/dashboard/transactions.php");
    exit;
}
?>
