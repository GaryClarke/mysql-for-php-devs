<?php // ORM/active-record.php

declare(strict_types=1);

use App\Model\Employee;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$employee = new Employee([
    'name' => 'Active Record',
    'age' => 25,
    'salary' => 70000
]);

$employee = $employee->save();

dd($employee);
