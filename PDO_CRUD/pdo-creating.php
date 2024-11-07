<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = Database::getInstance();
$pdo = $db->getPDO();

$stmt = $pdo->prepare("SELECT id, name, department FROM employees");
$stmt->execute();

// Fetching data
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department'] . "<br>";
}


