<?php // src/DB/Database.php

declare(strict_types=1);

namespace App\DB;

use PDO;

class Database
{
    private static ?Database $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $dsn = "mysql:host=mysql;dbname=course_demo";
        $username = "user";
        $password = "studentpassword";
        $this->pdo = new PDO($dsn, $username, $password);

        // PDO::ATTR_ERRMODE: This attribute controls error reporting in PDO. By setting it
        // to PDO::ERRMODE_EXCEPTION, you instruct PDO to throw exceptions whenever
        // a database error occurs. This mode is highly recommended because it allows you
        // to use try-catch blocks to handle errors gracefully
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): ?self
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    // Prevent duplication of connection
    private function __clone()
    {
    }
}
