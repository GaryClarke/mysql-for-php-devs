<?php // src/ORM/EntityManagerInterface.php

declare(strict_types=1);

namespace App\ORM;

interface EntityManagerInterface
{
    public function find(string $className, int $id): ?EntityInterface;

    public function persist(EntityInterface $entity): bool;

    public function remove(EntityInterface $entity): bool;
}