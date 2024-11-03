<?php

// Connect to MySQL using PDO
try {
    $dsn = "mysql:host=mysql;dbname=course_demo";
    $username = "user";
    $password = "studentpassword";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully dude";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


