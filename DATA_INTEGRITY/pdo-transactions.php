<?php // DATA_INTEGRITY/pdo-transactions.php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

try {
    // Start the transaction
    $pdo->beginTransaction();

    // Step 1: Determine the number of employees managed by manager 18
    $managerId = 18;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE manager_id = :manager_id");
    $stmt->execute(['manager_id' => $managerId]);
    $managerCount = $stmt->fetchColumn();

    // Step 2: Update employee's manager only if the new manager is managing 3 or fewer employees
    if ($managerCount <= 3) {
        $employeeId = 15;
        $stmt = $pdo->prepare("UPDATE employees SET manager_id = :manager_id WHERE id = :employee_id");
        $stmt->execute(['manager_id' => $managerId, 'employee_id' => $employeeId]);

        // Recalculate the manager's employee count after updating
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE manager_id = :manager_id");
        $stmt->execute(['manager_id' => $managerId]);
        $managerCount = $stmt->fetchColumn();
    }

    // Step 3: Increase manager's salary by 10% if managing more than 3 employees
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
