<?php // DATA_INTEGRITY/error-handling.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

try {
    // Attempt to execute a query
    $stmt = $pdo->prepare("INSERT INTO non_existent_table (name) VALUES (?)");
    $stmt->execute(['value']);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br><br>";
    echo "<strong>DETAILED ERROR INFORMATION:</strong> <br>";
    $errorInfo = $stmt->errorInfo();

    // The SQLSTATE error code is a standardized identifier that provides detailed information
    // about the nature of an error in SQL operations, helping to diagnose issues across
    // different database systems.
    echo "<strong>SQLSTATE error code:</strong> " . $errorInfo[0] . "<br>";

    // The driver-specific error code is a unique identifier provided by the database
    // driver that offers more precise information about an error, specific to the
    // database system being used.
    echo "<strong>Driver-specific error code:</strong> " . $errorInfo[1] . "<br>";

    // The driver-specific error message is a descriptive text provided by the database
    // driver that explains the nature of the error in detail, specific to the database
    // system being used.
    echo "<strong>Driver-specific error message:</strong> " . $errorInfo[2] . "<br>";
}
