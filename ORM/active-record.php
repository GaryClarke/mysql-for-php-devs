<?php // ORM/active-record.php

declare(strict_types=1);

use App\Model\Employee;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$employee = new Employee([
    'id' => 27
]);

$rowCount = $employee->delete();

dd("$rowCount employees deleted");
