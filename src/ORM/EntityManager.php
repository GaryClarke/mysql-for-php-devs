<?php // src/ORm/EntityManager.php

declare(strict_types=1);

namespace App\ORM;

use App\Attribute\Table;
use App\Entity\EntityInterface;
use PDO;
use ReflectionClass;

class EntityManager implements EntityManagerInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function find(string $className, int $id): ?EntityInterface
    {
        // Retrieve the table name associated with the class name using attributes.
        $table = $this->getTable($className);

        // Prepare a SQL statement to select all columns from the table where the ID matches.
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");

        // Execute the prepared statement with the provided ID.
        $stmt->execute([$id]);

        // Fetch the result as an associative array.
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // If data is found, create a new instance of the class.
        if ($data) {
            $entity = new $className();
            // Map the fetched data to the entity's properties.
            $this->mapDataToEntity($data, $entity);

            // Return the populated entity.
            return $entity;
        }

        // Return null if no data is found.
        return null;
    }

    public function persist(EntityInterface $entity): bool
    {
        // Use Reflection to obtain metadata about the Entity class
        $class = new ReflectionClass($entity);

        // Determine the database table name associated with the Entity
        $table = $this->getTable($class->getName());

        $columns = []; // Hold column names for the SQL query
        $values = []; // Hold values to be bound to the query
        $placeholders = []; // Hold placeholders for the SQL query

        // Iterate over all properties of the Entity object
        foreach ($class->getProperties() as $prop) {
            $name = $prop->getName(); // Get the property name
            $value = $prop->getValue($entity); // Get the value of the property

            // Only add the property to the query if it's not null
            if ($value !== null) {
                $columns[] = $name;
                $values[] = $value;
                // Add a placeholder for prepared statement
                $placeholders[] = '?';
            }
        }

        // Check IF the Entity has an ID, indicating an update is required
        $id = $entity->getId() ?? null;
        if ($id) {
            // Map each column to a placeholder in the SQL statement to prevent SQL injection
            // and prepare for binding values. e.g. "name" BECOMES "name = ?"
            $setParts = array_map(fn($col) => "$col = ?", $columns);

            // Join all column assignments into a single string to form the SET
            // part of the UPDATE statement.
            $sql = "UPDATE $table SET " . implode(', ', $setParts) . " WHERE id = ?";

            dd($sql);

            // Append the ID to the list of values to ensure the correct record is updated.

        // ELSE
        } else {
            // Prepare SQL for insert
            $sql = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
        }

        // Prepare and execute the SQL statement
        $stmt = $this->pdo->prepare($sql);
        $executed = $stmt->execute($values);

        // If it's an insert, and it executed successfully, set the ID on the Entity
        if (!$id && $executed) {
            $entity->setId((int) $this->pdo->lastInsertId());
        }

        // Return true if the SQL executed successfully, otherwise false
        return $executed;
    }

    public function remove(EntityInterface $entity): bool
    {
        // TODO: Implement remove() method.
    }

    private function mapDataToEntity(array $data, EntityInterface $entity): void
    {
        // Create a reflection class instance for the entity to access its properties.
        $reflect = new ReflectionClass($entity);

        // Iterate through each key-value pair in the data array.
        foreach ($data as $key => $value) {

            // Check if the entity has a property matching the data key.
            if ($reflect->hasProperty($key)) {

                // Get the reflection property from the entity.
                $prop = $reflect->getProperty($key);

                // Make the property accessible even if it is protected or private.
                $prop->setAccessible(true);

                // Set the value of the property using the value from the data array.
                $prop->setValue($entity, $value);
            }
        }
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
