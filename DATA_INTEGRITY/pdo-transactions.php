<?php // DATA_INTEGRITY/pdo-transactions.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// Get managerId and employeeId from query parameters with default fallback
$managerId = filter_input(INPUT_GET, 'manager_id', FILTER_VALIDATE_INT);
$employeeId = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);

try {
    // Start the transaction
    $pdo->beginTransaction();

    // Step 1: Determine the number of employees managed by the manager
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE manager_id = :manager_id");
    $stmt->execute(['manager_id' => $managerId]);
    $managerCount = $stmt->fetchColumn();

    // Step 2: Update employee's manager only if the new manager is managing 3 or fewer employees
    if ($managerCount <= 3) {
        $stmt = $pdo->prepare("UPDATE employees SET manager_id = :manager_id WHERE id = :employee_id");
        $stmt->execute(['manager_id' => $managerId, 'employee_id' => $employeeId]);

        // Increment the manager's employee count after updating
        $managerCount++;
    }

    // Step 3: Increase manager's salary by 10% if now managing more than 3 employees
    if ($managerCount > 3) {
        $stmt = $pdo->prepare("UPDATE employees SET salary = salary * 1.1 WHERE id = :manager_id");
        $stmt->execute(['manager_id' => $managerId]);
    }

    // Commit the transaction
    $pdo->commit();
    echo "Transaction completed successfully";

} catch (Exception $e) {
    // Roll back the transaction if any error occurs
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
