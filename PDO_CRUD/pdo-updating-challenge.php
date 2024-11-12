<?php // PDO_CRUD/pdo-updating-challenge.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare an UPDATE statement
// Update the manager to Batman for any employee whose manager is Lucy Adams
$stmt = $pdo->prepare("
    UPDATE employees AS e
    JOIN employees AS current_manager ON e.manager_id = current_manager.id
    JOIN employees AS new_manager ON new_manager.name = :new_manager_name
    SET e.manager_id = new_manager.id
    WHERE current_manager.name = :current_manager_name
");

// Define parameters
$newManagerName = 'Batman';
$currentManagerName = 'Lucy Adams';

$stmt->bindParam(':new_manager_name', $newManagerName);
$stmt->bindParam(':current_manager_name', $currentManagerName);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully" . PHP_EOL;
} else {
    echo "Error updating record: " . $stmt->errorInfo()[2];
}

