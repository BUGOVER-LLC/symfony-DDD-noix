<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Exception;

use RuntimeException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends RuntimeException
{
    public function __construct(private readonly ConstraintViolationListInterface $violations)
    {
        parent::__construct('validation failed');
    }

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violations;
    }
}
