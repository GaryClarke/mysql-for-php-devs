<?php // src/Model/Model.php

declare(strict_types=1);

namespace App\Model;

use App\DB\Database;
use PDO;

class Model
{
    protected string $tableName;
    protected string $primaryKey = 'id';
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes): void
    {
        $this->attributes = array_merge($this->attributes, $attributes);
    }

    public function insert(): self
    {
        // Extract the keys (column names) from the attributes array.
        $keys = array_keys($this->attributes);

        // Extract the values corresponding to the column names.
        $values = array_values($this->attributes);

        // Create an array of placeholders for a parameterized query.
        // This ensures that the query is safe from SQL injection.
        $placeholders = array_fill(0, count($keys), '?');

        // Prepare the SQL INSERT statement.
        // The column names are joined into a comma-separated list.
        // The placeholders array is also joined, ensuring alignment with the column names.
        $stmt = $this->getPDO()->prepare("INSERT INTO {$this->tableName} ("
            . implode(',', $keys) . ") VALUES ("
            . implode(',', $placeholders) . ")");

        // Execute the prepared statement with the array of values.
        // This binds the values to the placeholders in the prepared statement, ensuring safety.
        $stmt->execute($values);

        // After a successful insert, retrieve the last inserted ID from the database.
        // This assumes the table's primary key is auto-incremented.
        $this->attributes[$this->primaryKey] = $this->getPDO()->lastInsertId();

        // Return the current instance for method chaining or further operations.
        return $this;
    }

    public function update(): self
    {
        // Filter out the primary key or any other keys you don't want to update
        $keys = array_filter(array_keys($this->attributes), function ($key) {
            return $key != $this->primaryKey;
        });

        // Create a SQL snippet for the SET clause by mapping each key to 'key = ?'.
        $set = implode(', ', array_map(function ($key) {
            return "$key = ?";
        }, $keys));

        // Gather all values from the attributes array except the primary key.
        $values = array_map(function ($key) {
            return $this->attributes[$key];
        }, $keys);

        // Prepare a SQL UPDATE statement using the table name, SET clause, and primary key condition.
        $stmt = $this->getPDO()->prepare("UPDATE {$this->tableName} SET $set WHERE {$this->primaryKey} = ?");

        // Add the primary key value at the end of the values array for the WHERE clause.
        $values[] = $this->attributes[$this->primaryKey];

        // Execute the prepared statement with the array of values.
        $stmt->execute($values);

        // Return the instance to allow for method chaining or further operations.
        return $this;
    }

    public function getPDO(): PDO
    {
        return Database::getInstance()->getPDO();
    }
}
