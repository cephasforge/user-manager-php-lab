<?php 
require '../includes/db.php';
require '../includes/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_email = $_POST['email'];
    $user_username = $_POST['username'];
    $user_userpwd = password_hash($_POST['userpwd'], PASSWORD_DEFAULT);

    if(createUser($pdo, $user_email, $user_username, $user_userpwd)){
        $_SESSION['flash'] = 'Account created !';
        header('Location: signin.php');
        exit;
    }

    echo "Email already used !";
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
        <h1>Sign Up</h1>
    </div>
    <div>
        <form action="signup.php" method="post" id="signup-form">

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>

            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>

            <div>
                <label for="userpwd">Password</label>
                <input type="password" id="pwd" name="userpwd">
            </div>

            <div>
                <button type="submit">Signup</button>
            </div>
        </form>
    </div>

    <div>
        <p>Already have an account? click <a href="signin.php">here</a></p>
    </div>
</body>
</html>
