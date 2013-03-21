<?php

// Database Class: main connection to the database
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=shopright';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    private function __construct() {}
    
    // get database connection
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>
