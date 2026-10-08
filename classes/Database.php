<?php
final class Database{
    public static function connect(array $config): PDO {
        // Data Source Name (dsn)
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['name'],
            $config['charset']
        );

        try {
            return new PDO($dsn, $config['user'], $config['pass'], [
                //Throw an exception when a SQL query fails
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                //Return rows as associative arrays
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                //Use native prepared statements instead of PHP emulation
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            error_log('Database connection impossible : ' . $e->getMessage());
            http_response_code(500);
            exit('Error, please try later!');
        }
    }
}