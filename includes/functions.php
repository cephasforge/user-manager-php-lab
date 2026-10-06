<?php
function createUser(PDO $pdo, string $email, string $username, string $password){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");

    try{
        return $stmt->execute([$email, $username, $hash]);
    }catch(PDOException $e){
        if($e->getCode() === '23000'){
            return false;
        }
        throw $e;
    }
}
function getUsers(PDO $pdo){    
    $stmt = $pdo->query("SELECT id, username, email, role FROM users ORDER BY id");
    return $stmt->fetchAll();
}

function getUserByEmail(PDO $pdo, string $email): array|false{
    $stmt = $pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

