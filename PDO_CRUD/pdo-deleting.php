<?php // PDO_CRUD/pdo-deleting.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare a DELETE statement
$stmt = $pdo->prepare("DELETE FROM employees WHERE id = :id");

$employeeId = 13; // example ID of the employee to delete

// Bind parameter
$stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->errorInfo()[2];
}

