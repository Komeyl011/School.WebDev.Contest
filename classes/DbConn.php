<?php

class DbConn
{
    protected static string $host = "localhost";
    protected static string $username = 'root';
    protected static string $pass = '';
    protected static string $db = 'proxima';

    //Function to connect to the db
    public static function connect(): PDO
    {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db;

        $pdo = new PDO($dsn, self::$username, self::$pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}