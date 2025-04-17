<?php
function addUser($user, $connection) {
    $name = trim($user['full_name']);
    $email = trim($user['email']);
    $password = $user['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $connection->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, $hashed_password]);
}

function login($email, $password, $connection) {
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}
