<?php // PDO_CRUD/pdo-reading-challenge.php

# Challenge - use pdo and the DB connection class to retrieve
# the employee name, department name, and manager name from your database

// Autoload
require_once dirname(__DIR__) . "/vendor/autoload.php";

// Get db instance
$db = \App\DB\Database::getInstance();

// Get pdo off of the $db
$pdo = $db->getPDO();

// Prepare the statement
$stmt = $pdo->prepare("SELECT 
    e.name AS EmployeeName,
    d.name AS DepartmentName,
    m.name AS ManagerName
FROM 
    employees e
    JOIN department d ON e.department_id = d.id
    LEFT JOIN employees m ON e.manager_id = m.id");

$stmt->execute();

// Fetch the data one row at a time
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Name: " . $row['EmployeeName'] . ", Dept: " . $row['DepartmentName'] . ", Manager: " . $row['ManagerName'] . "<br>";
}

