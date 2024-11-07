<?php

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
