<?php // PDO_CRUD/pdo-creating-challenge.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare an INSERT statement to create a new 'Design' department
$stmt = $pdo->prepare("INSERT INTO department 
    (name) 
    VALUES (?)");
$data = ['Design'];

// Execute the statement with data
if ($stmt->execute($data)) {
    echo "New record created successfully" . PHP_EOL;
} else {
    // A human-readable error message from the database driver.
    echo "Error: " . $stmt->errorInfo()[2];
}




