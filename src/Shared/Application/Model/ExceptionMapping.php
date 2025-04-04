<?php

declare(strict_types=1);

namespace App\Shared\Application\Model;

class ExceptionMapping
{
    public function __construct(
        private readonly int $code,
        private readonly bool $hidden,
        private readonly bool $loggable
    )
    {
    }

    public static function fromCode(int $code): self
    {
        return new self($code, true, false);
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }

    public function isLoggable(): bool
    {
        return $this->loggable;
    }
}
