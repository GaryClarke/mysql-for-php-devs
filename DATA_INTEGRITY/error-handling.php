<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

try {
    // Attempt to execute a query
    $stmt = $pdo->prepare("INSERT INTO non_existent_table (column) VALUES (?)");
    $stmt->execute(['value']);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "Detailed Error Information: <br>";
    $errorInfo = $stmt->errorInfo();
    echo "SQLSTATE error code: " . $errorInfo[0] . "<br>";
    echo "Driver-specific error code: " . $errorInfo[1] . "<br>";
    echo "Driver-specific error message: " . $errorInfo[2] . "<br>";
}
