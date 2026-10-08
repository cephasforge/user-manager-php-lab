<?php 
require 'includes/topnav.php';
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
