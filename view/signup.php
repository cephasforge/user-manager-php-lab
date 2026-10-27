<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'includes/bootstrap.php'; ?>
    <title>Document</title>
</head>
<body class="bg-home">

    <style><?php  require 'assets/css/main.css'; ?></style> 

    <div class="bg-glass w-50 mx-auto justify-content-center align-items-center border mt-5 p-5">
        <div class="text-center text-white">
            <h1>Sign Up</h1>
        </div>

        <?php if (isset($flash)): ?>
        <div class="text-center border rounded-3 p-3 bg-glass-flash"">
            <p class="text-white h5"><?= htmlspecialchars($flash) ?></p>
        </div>
        <?php endif; ?>
        
        <div>
            <form action="signup" method="post" id="signup-form">
                <div class="mt-3">
                    <label class="form-label text-white" for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required value="<?= htmlspecialchars($old_email ?? '') ?>">
                </div>

                <div class="mt-3">
                    <label class="form-label text-white" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Enter your username" required value="<?= htmlspecialchars($old_username ?? '') ?>">
                </div>

                <div class="mt-3">
                    <label class="form-label text-white" for="userpwd">Password</label>
                    <input class="form-control" type="password" id="pwd" name="password" placeholder="Create your password" required>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary text-dark w-100" type="submit">Signup</button>
                </div>
            </form>
        </div>

        <div class="text-white text-center mt-5 h4">
            <p>Already have an account? click <a class="text-dark"  href="signin">here</a></p>
        </div>
    </div>
</body>
</html>
