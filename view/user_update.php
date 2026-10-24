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
        <form action="update" method="POST">
            <div>
                <label for="id">ID</label>
                <input readonly type="text" id="id" name="id" value="<?= htmlspecialchars($user->getId()) ?>">
            </div>

            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($user->getUsername()) ?>">
            </div>

            <div>
                <label for="email">Email</label>
                <input readonly type="text" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>">
            </div>

            <div>
                <label for="role">Role</label>
                <select id="role" name="role">
                    <option value="normal" <?php if($user->getRole() == 'normal'){echo 'selected';} ?>>Normal User</option>
                    <option value="admin" <?php if($user->getRole() == 'admin'){echo 'selected';} ?>>Admin User</option>
                </select>
            </div>

            <div>
                <label for="created_at">Created At</label>
                <input readonly type="text" id="created_at" name="created_at" value="<?= htmlspecialchars($user->getCreatedAt()) ?>">
            </div>

            <div>
                <button type="submit">Update</button>
            </div>
        </form>

        <form action="delete" method="POST">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($user->getId()) ?>">
            <button type="submit">DELETE</button>
        </form>
    </div>
</body>
</html>