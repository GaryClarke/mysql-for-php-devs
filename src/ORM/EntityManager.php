<?php

declare(strict_types=1);

namespace App\ORM;

class EntityManager implements EntityManagerInterface
{
    public function find(string $className, int $id): ?EntityInterface
    {
        // TODO: Implement find() method.
    }

    public function persist(EntityInterface $entity): bool
    {
        // TODO: Implement persist() method.
    }

    public function remove(EntityInterface $entity): bool
    {
        // TODO: Implement remove() method.
    }
}
