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
    </div>

</body>
</html>
