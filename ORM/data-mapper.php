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
$employee = $entityManager->find(Employee::class, 13);

dd($employee);
