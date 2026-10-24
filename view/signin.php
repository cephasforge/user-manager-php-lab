<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'includes/bootstrap.php'; ?>
    <title>Document</title>
</head>
<body>

    <style><?php require 'assets/css/main.css'; ?></style>

    <div>
        <div class="bg-glass w-50 mx-auto justify-content-center align-items-center border mt-5 p-5">
            <div class="text-center text-white">
                <h1>Sign In</h1>
            </div>

            <form action="signin" method="POST">
                <div class="mt-3">
                    <label class="form-label text-white" for="username">Email</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="mt-3">
                    <label class="form-label text-white" for="userpwd">Password</label>
                    <input class="form-control" type="password" id="pwd" name="password" placeholder="Enter your password" required>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary text-dark w-100" type="submit">Signin</button>
                </div>

                <div class="text-white text-center mt-5 h4">
                    <p>Dont have an account? click <a class="text-dark" href="signup">here</a></p>
                </div>        
            </form>
        </div>
    </div>
</body>
</html>
