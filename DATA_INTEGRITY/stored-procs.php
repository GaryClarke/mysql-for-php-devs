<?php // DATA_INTEGRITY/stored-procs.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

$stmt = $pdo->prepare("CALL GetEmployeeDetails(:empID)");
$stmt->bindParam(':empID', $employeeId, PDO::PARAM_INT);
$stmt->execute();

// Fetch the single row from the result set
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the row is actually returned
if ($row) {
    echo "<h2>Employee Details</h2>";
    echo "ID: " . htmlspecialchars($row['id']) . "<br>";
    echo "Name: " . htmlspecialchars($row['name']) . "<br>";
    echo "Position: " . htmlspecialchars($row['position']) . "<br>";
    echo "Department: " . htmlspecialchars($row['department']) . "<br>";
    echo "Salary: " . htmlspecialchars($row['salary']) . "<br>";
} else {
    echo "No employee found with ID: $employeeId";
}

// Close the cursor to enable other statements to be executed
$stmt->closeCursor();
