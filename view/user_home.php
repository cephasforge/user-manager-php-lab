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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <th><?= htmlspecialchars($user->getId()) ?></th>
                    <td><?= htmlspecialchars($user->getUsername()) ?></td>
                    <td><?= htmlspecialchars($user->getEmail()) ?></td>
                    <td>
                        <form action="user" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user->getId()) ?>"> 
                            <button type="submit">More</button>
                        </form>
                        <?php if($_SESSION['user_role'] == 'super_admin'): ?>
                        <form action="delete" method="POST">
                            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($user->getId()) ?>">
                            <button type="submit">DELETE</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>