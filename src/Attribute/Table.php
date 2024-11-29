<?php

declare(strict_types=1);

namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class Table
{
    public function __construct(public string $name)
    {
    }
}