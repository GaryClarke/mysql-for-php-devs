<?php // PDO_CRUD/pdo-deleting-challenge.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare a DELETE statement
$stmt = $pdo->prepare("DELETE FROM department
    WHERE NOT EXISTS (
        SELECT 1 FROM employees
        WHERE employees.department_id = department.department_id
    );
");

// Execute the statement
if ($stmt->execute()) {
    echo "Records deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->errorInfo()[2];
}
