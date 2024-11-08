<?php // PDO_CRUD/pdo-creating.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare an INSERT statement
$stmt = $pdo->prepare("INSERT INTO employees 
    (name, age, salary, department_id, manager_id) 
    VALUES (?, ?, ?, ?, ?)");
$data = ['Batman', 30, 50000, 3, 16];

// Execute the statement with data
if ($stmt->execute($data)) {
    echo "New record created successfully";
} else {
    // A human-readable error message from the database driver.
    echo "Error: " . $stmt->errorInfo()[2];
}





