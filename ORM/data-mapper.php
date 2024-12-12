<?php // ORM/data-mapper.php

declare(strict_types=1);

use App\DB\Database;
use App\ORM\EntityManager;
use App\Entity\Employee;

require_once dirname(__DIR__) . "/vendor/autoload.php";

// Create a new PDO connection
$pdo = Database::getInstance()->getPDO();

// Create an instance of EntityManager
$entityManager = new EntityManager($pdo);

// Retrieve an employee by ID
$employee = $entityManager->find(Employee::class, 18);

// Delete an employee
if ($entityManager->remove($employee)) {
    echo "Employee deleted successfully.\n";
} else {
    echo "Failed to delete employee.\n";
}

// Update an employee's details
//if ($employee) {
//    $employee->setName("New Name");
//    if ($entityManager->persist($employee)) {
//        echo "Employee updated successfully.\n";
//    } else {
//        echo "Failed to update employee.\n";
//    }
//}

// Insert a new employee
//$newEmployee = new Employee();
//$newEmployee->setName("New Employee");
//$newEmployee->setAge(25);
//$newEmployee->setSalary(40000);
//if ($entityManager->persist($newEmployee)) {
//    echo "New employee created with ID: " . $newEmployee->getId() . "\n";
//} else {
//    echo "Failed to create new employee.\n";
//}



// Retrieve an employee by ID
//$employee = $entityManager->find(Employee::class, 13);
//
//dd($employee);
