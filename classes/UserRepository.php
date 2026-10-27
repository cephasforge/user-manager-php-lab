<?php

class UserRepository{

    private static string $dbpath = '\..\config\database.php';

    static function addUser(User $user){
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $stmt = $pdo->prepare('INSERT INTO users (email, username, password) VALUES (?,?,?)');
        $stmt->execute([$user->getEmail(), $user->getUsername(), $user->getPassword()]);
    }

    static function getUserByEmail(string $email): mixed {
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if(!$row){
            return false;
        }else{
            return new User(
                $row['id'],
                $row['username'],
                $row['email'],
                $row['password'],
                $row['role'],
                $row['created_at']
            );
        }
    }

    static function deleteUser(int $id){
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $stmt = $pdo->prepare('DELETE from users WHERE id = ?');

        return $stmt->execute([$id]);
    }
    
    static function getUserById(int $id): mixed {
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if(!$row){
            return false;
        }else{
            return new User(
                $row['id'],
                $row['username'],
                $row['email'],
                $row['password'],
                $row['role'],
                $row['created_at']
            );
        }
    }

    static function getUsers(){
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $users = [];

        $stmt = $pdo->prepare('SELECT * FROM users WHERE id > 1 ORDER by id');
        $stmt->execute();

        foreach($stmt->fetchAll() as $row){
            $user = new User(
                $row['id'],
                $row['username'],
                $row['email'],
                $row['password'],
                $row['role'],
                $row['created_at'],
            );

            $users[] = $user;
        }

        return $users;
    }

    static function updateUser(User $user): bool{
        $config = require __DIR__ .self::$dbpath;
        $pdo = Database::connect($config);

        $stmt = $pdo->prepare('UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?');

        return $stmt->execute([$user->getUsername(), $user->getEmail(), $user->getRole(), $user->getId()]);
    }

    static public function getFormatedDate(string $date): string{
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);

        if($dateTime === false){
            return 'NA';
        }

        $mouth = strtoupper($dateTime->format('M'));
        $day = $dateTime->format('d');
        $hour = $dateTime->format('gA');

        return "$mouth $day at $hour";
    }
}