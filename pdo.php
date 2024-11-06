<?php

// Connect to MySQL using PDO
try {
    // DSN stands for Data Source Name. It's a string that
    // contains the information needed to connect to a database.
    $dsn = "mysql:host=mysql;dbname=course_demo";
    $username = "user";
    $password = "studentpassword";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully using pdo";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
