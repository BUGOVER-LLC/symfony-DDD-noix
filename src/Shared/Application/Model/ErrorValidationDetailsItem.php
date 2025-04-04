<?php

declare(strict_types=1);

namespace App\Shared\Application\Model;

class ErrorValidationDetailsItem
{
    public function __construct(private readonly string $field, private readonly string $message)
    {
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
