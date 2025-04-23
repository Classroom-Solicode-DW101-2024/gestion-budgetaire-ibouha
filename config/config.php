<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$host = 'localhost';
$dbname = 'spendwise';
$user = 'root'; 
$pass = '';     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


$categories = [
    'revenu' => ['Salaire', 'Bourse', 'Ventes', 'Autres'],
    'depense' => ['Logement', 'Transport', 'Alimentation', 'Santé', 'Divertissement', 'Éducation', 'Autres']
];

foreach ($categories as $type => $noms) {
    foreach ($noms as $nom) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE nom = ? AND type = ?");
        $stmt->execute([$nom, $type]);
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $insert = $pdo->prepare("INSERT INTO categories (nom, type) VALUES (?, ?)");
            $insert->execute([$nom, $type]);
        }
    }
}


