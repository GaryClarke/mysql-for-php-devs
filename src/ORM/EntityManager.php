<?php // src/ORm/EntityManager.php

declare(strict_types=1);

namespace App\ORM;

use App\Attribute\Table;
use App\Entity\EntityInterface;
use ReflectionClass;

class EntityManager implements EntityManagerInterface
{
    public function find(string $className, int $id): ?EntityInterface
    {
        // Retrieve the table name associated with the class name using attributes.
        $table = $this->getTable($className);

        dd($table);

        // Prepare a SQL statement to select all columns from the table where the ID matches.

        // Execute the prepared statement with the provided ID.

        // Fetch the result as an associative array.

        // If data is found, create a new instance of the class.

            // Map the fetched data to the entity's properties.

            // Return the populated entity.

        // Return null if no data is found.
    }

    public function persist(EntityInterface $entity): bool
    {
        // TODO: Implement persist() method.
    }

    public function remove(EntityInterface $entity): bool
    {
        // TODO: Implement remove() method.
    }

    private function getTable(string $className): string
    {
        // Create a new ReflectionClass object for the specified class name.
        $reflect = new ReflectionClass($className);

        // Retrieve all attributes of the class that are instances of the Table class.
        $attributes = $reflect->getAttributes(Table::class);

        // Check if any Table attributes are defined on the class.
        // If an attribute is present, create a new instance of the attribute and return its 'name' property.
        // If no attribute is present, return the class name converted to lowercase as the default table name.
        return $attributes ? $attributes[0]->newInstance()->name : strtolower($reflect->getShortName());
    }
}
