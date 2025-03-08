<?php

declare(strict_types=1);

namespace App\Shared\Application\Doctrine\Timestamp;

use DateTimeImmutable;

trait Timestampable
{
    private ?DateTimeImmutable $createdAt = null;

    private ?DateTimeImmutable $updatedAt = null;

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): static
    {
        $this->updatedAt = new DateTimeImmutable();

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): static
    {
        $this->createdAt = new DateTimeImmutable();

        return $this;
    }
}
