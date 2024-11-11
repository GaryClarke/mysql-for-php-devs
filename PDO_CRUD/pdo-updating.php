<?php // PDO_CRUD/pdo-updating.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare an UPDATE statement
$stmt = $pdo->prepare("UPDATE employees SET salary = :salary WHERE id = :id");
$newSalary = 60000;
$employeeId = 1;

// Bind parameters
$stmt->bindParam(':salary', $newSalary, PDO::PARAM_INT);
$stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully" . PHP_EOL;
} else {
    echo "Error updating record: " . $stmt->errorInfo()[2];
}
