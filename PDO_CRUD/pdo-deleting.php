<?php // PDO_CRUD/pdo-deleting.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Prepare a DELETE statement
$stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");

// example ID of the product to delete
$id = 1;

// Bind parameter
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->errorInfo()[2];
}

