<?php // src/Entity/Employee.php

declare(strict_types=1);

namespace App\Entity;

use App\Attribute\Table;

#[Table('employees')]
class Employee implements EntityInterface
{
    private ?int $id = null;
    private string $name;
    private int $age;
    private ?int $salary = null;
    private ?int $department_id = null;
    private ?int $manager_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): void
    {
        $this->salary = $salary;
    }

    public function getDepartmentId(): ?int
    {
        return $this->department_id;
    }

    public function setDepartmentId(?int $department_id): void
    {
        $this->department_id = $department_id;
    }

    public function getManagerId(): ?int
    {
        return $this->manager_id;
    }

    public function setManagerId(?int $manager_id): void
    {
        $this->manager_id = $manager_id;
    }
}