
<?php

function soldUser($connection) {
    $user_id = $_SESSION['user']['id'];

    $stmt = $connection->prepare("SELECT SUM(t.montant) FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? AND c.type = 'revenu'");
    $stmt->execute([$user_id]);
    $total_revenus = $stmt->fetchColumn();

    $stmt = $connection->prepare("SELECT SUM(t.montant) FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? AND c.type = 'depense'");
    $stmt->execute([$user_id]);
    $total_depenses = $stmt->fetchColumn();

    return ($total_revenus ?? 0) - ($total_depenses ?? 0);
}

function detailsUser($connection) {
    $user_id=$_SESSION['user']['id'];
    // Get revenus
    $stmt = $connection->prepare("SELECT SUM(t.montant) FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? AND c.type = 'revenu' ");
    $stmt->execute([$user_id]);
    $revenus = $stmt->fetchColumn();

    // Get depenses
    $stmt = $connection->prepare("SELECT SUM(t.montant) FROM transactions t JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? AND c.type = 'depense' ");
    $stmt->execute([$user_id]);
    $depenses = $stmt->fetchColumn();

    return [
        'revenus' => $revenus ?? 0,
        'depenses' => $depenses ?? 0
    ];
}

function totalIncomesByCategory($connection) {
    $user_id = $_SESSION['user']['id'];

    $stmt = $connection->prepare("SELECT c.nom, SUM(t.montant) AS total 
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = ? AND c.type = 'revenu' 
        GROUP BY c.nom");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function totalExpensesByCategory($connection) {
    $user_id = $_SESSION['user']['id'];

    $stmt = $connection->prepare("SELECT c.nom, SUM(t.montant) AS total 
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = ? AND c.type = 'depense' 
        GROUP BY c.nom");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

