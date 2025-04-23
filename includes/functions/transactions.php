<?php
//functions/transactions.php
function addTransaction($transaction, $connection)
{
    $stmt = $connection->prepare("INSERT INTO transactions (user_id, category_id, montant, description, date_transaction) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([
        $transaction['user_id'],
        $transaction['category_id'],
        $transaction['montant'],
        $transaction['description'],
        $transaction['date_transaction']
    ]);
}

function deleteTransaction($idTransaction, $connection)
{
    $stmt = $connection->prepare("DELETE FROM transactions WHERE id = ?");
    return $stmt->execute([$idTransaction]);
}

function editTransaction($idTransaction, $newTransaction, $connection)
{
    $stmt = $connection->prepare("UPDATE transactions SET category_id = ?, montant = ?, description = ?, date_transaction = ? WHERE id = ?");
    return $stmt->execute([
        $newTransaction['category_id'],
        $newTransaction['montant'],
        $newTransaction['description'],
        $newTransaction['date_transaction'],
        $idTransaction
    ]);
}

function listTransactions($connection)
{
    $userId = $_SESSION['user']['id'];
    $stmt = $connection->prepare("SELECT t.*, c.nom AS category_name, c.type FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? ORDER BY date_transaction DESC");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listTransactionsByMonth($connection, $year, $month)
{
    $userId = $_SESSION['user']['id'];
    $stmt = $connection->prepare("SELECT t.*, c.nom AS category_name, c.type FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? AND YEAR(date_transaction) = ? AND MONTH(date_transaction) = ? ORDER BY date_transaction DESC");
    $stmt->execute([$userId, $year, $month]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getMaxTransaction($connection, $type, $year, $month) {
    $userId = $_SESSION['user']['id'];
    $stmt = $connection->prepare("SELECT montant, description, date_transaction
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = ? AND c.type = ? AND YEAR(t.date_transaction) = ? AND MONTH(t.date_transaction) = ?
        ORDER BY montant DESC LIMIT 1");
    $stmt->execute([$userId, $type, $year, $month]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}