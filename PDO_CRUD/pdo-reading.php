<?php // PDO_CRUD/pdo-reading.php

// Autoload
require_once dirname(__DIR__) . "/vendor/autoload.php";

// Get db instance
$db = \App\DB\Database::getInstance();

// Get pdo off of the $db
$pdo = $db->getPDO();

// Prepare the statement
$stmt = $pdo->prepare("SELECT id, name, department_id FROM employees");

// Execute the statement
$stmt->execute();

// Fetch the data one row at a time
//while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department_id'] . "<br>";
//}

// Fetching data all at once
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department_id'] . "<br>";
}

