<?php
class Database {
    private static $pdo;

    public static function conectar() {
        if (!isset(self::$pdo)) {
            $config = require __DIR__ . '/../../config/config.php';
            $dsn = "mysql:host=" . $config['db']['host'] . ";dbname=" . $config['db']['dbname'];
            self::$pdo = new PDO($dsn, $config['db']['user'], $config['db']['password']);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
?>