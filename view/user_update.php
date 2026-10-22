<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require 'includes/user_topnav.php';
    ?>
    
    <div>
        <form action="signin" method="POST">
            <div>
                <label for="email">ID</label>
                <input readonly type="text" id="email" name="email" value="<?= htmlspecialchars($user->getId()) ?>">
            </div>

            <div>
                <label for="username">Username</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($user->getUsername()) ?>">
            </div>

            <div>
                <label for="userpwd">Email</label>
                <input readonly type="text" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>">
            </div>

            <div>
                <label for="email">Role</label>
                <select id="role" name="role">
                    <option value="normal">Normal User</option>
                    <option value="admin">Admin User</option>
                </select>
            </div>

            <div>
                <label for="email">Created At</label>
                <input readonly type="text" id="email" name="email" value="<?= htmlspecialchars($user->getCreatedAt()) ?>">
            </div>

            <div>
                <button type="submit">Update</button>
                <button type="submit">Delete</button>
            </div>
        </form>
    </div>
</body>
</html>