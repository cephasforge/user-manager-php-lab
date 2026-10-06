<?php
session_start();

require '../includes/db.php';
require '../includes/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['userpwd'];

    $user = getUserByEmail($pdo, $email);

    if($user && password_verify($password, $user['password'])){
        // session_regenerate_id(true);
        // $_SESSION['user_id'] = $user['id'];
        // $_SESSION['role'] = $user['role'];

        switch($user['role']){
            case 'normal':
                header('Location: normal/normal.php');
                exit;
            case 'admin':
                header('Location: admin/admin.php');
                exit;
            case 'super_admin':
                header('Location: superadmin/superadmin.php');
                exit;
            default:
                header('Location: 404.php');
                exit;
        }
    }else{
        echo 'wrong password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Sign In</h1>
    </div>
    <div>
        <form action="signin.php" method="POST">
            <div>
                <label for="username">email</label>
                <input type="text" id="email" name="email">
            </div>

            <div>
                <label for="userpwd">Password</label>
                <input type="password" id="pwd" name="userpwd">
            </div>

            <div>
                <button type="submit">Signin</button>
            </div>
        </form>
    </div>

    <div>
        <p>Dont have an account? click <a href="signup.php">here</a></p>
    </div>
</body>
</html>
