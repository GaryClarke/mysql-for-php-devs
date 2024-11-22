<?php
// Load necessary dependencies (update with your actual paths)
require_once dirname(__DIR__) . "/vendor/autoload.php";

// Database connection using your custom Database class
$db = \App\DB\Database::getInstance();
$pdo = $db->getPDO();

// The employee ID for which you want to fetch projects
$employeeId = 13;

try {
    // Prepare the stored procedure call
    $stmt = $pdo->prepare("CALL GetEmployeeProjects(:empID)");
    $stmt->bindParam(':empID', $employeeId, PDO::PARAM_INT);

    // Execute the stored procedure
    $stmt->execute();

    // Fetch the results
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are results and display them
    if ($projects) {
        echo "<h2>Projects for Employee ID: $employeeId</h2><ul>";
        foreach ($projects as $project) {
            echo "<li>" . htmlspecialchars($project['project_name']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No projects found for Employee ID: $employeeId.";
    }

    // Close the cursor to enable other statements to be executed
    $stmt->closeCursor();
} catch (PDOException $e) {
    // Handle any exceptions
    echo "Error: " . htmlspecialchars($e->getMessage());
}
