<?php

declare(strict_types=1);

namespace App\Shared\Application\ValueObject;

interface ValueObjectInterface
{
    public function getValue(): mixed;

    public function isValid(): bool;
}
