<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

$stmt = $pdo->prepare("SELECT id, name, department_id FROM employees");
$stmt->execute();

// Fetching data one row at a time
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department_id'] . "<br>";
}

// Fetching data all at once
//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//foreach ($results as $row) {
//    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department_id'] . "<br>";
//}
