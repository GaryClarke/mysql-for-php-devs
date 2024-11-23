<?php // src/Model/Model.php

declare(strict_types=1);

namespace App\Model;

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
}